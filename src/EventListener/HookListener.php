<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 *
 * @author  Thomas Körner <t.koerner@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */


namespace HeimrichHannot\ContaoParallaxImageBundle\EventListener;


use Contao\BackendTemplate;
use Contao\Controller;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Contao\Image;
use Contao\ModuleArticle;
use Contao\StringUtil;
use HeimrichHannot\ContaoParallaxImageBundle\Asset\FrontendAsset;
use HeimrichHannot\UtilsBundle\Image\ImageUtil;
use Twig\Environment;

class HookListener
{
	/**
	 * @var Environment
	 */
	private $twig;
	/**
	 * @var ImageUtil
	 */
	private $imageUtil;
    /**
     * @var FrontendAsset
     */
    private $frontendAsset;

    /**
     * @var FrontendTemplate
     */
    protected $articleTemplate;

    public function __construct(Environment $twig, ImageUtil $imageUtil, FrontendAsset $frontendAsset)
	{
		$this->twig = $twig;
		$this->imageUtil = $imageUtil;
        $this->frontendAsset = $frontendAsset;
    }


	/**
	 * @param BackendTemplate|FrontendTemplate $template
	 * @param array $data
	 * @param ModuleArticle $module
	 */
	public function onCompileArticle($template, $data, $module)
	{
		// Add parallax background image to article template
		if ($template->addParallaxImage && $template->parallaxImageSingleSRC != '') {
			$objModel = FilesModel::findByUuid($template->parallaxImageSingleSRC);
			if ($objModel !== null && is_file(TL_ROOT . '/' . $objModel->path))
			{
			    $this->frontendAsset->addFrontendAssets();
				$templateData = $data;
				$templateData['parallaxImageSingleSRC'] = $objModel->path;
				$templateData['size'] = $module->parallaxImageSize;
				$imageData = [];
				$this->imageUtil->addToTemplateData('parallaxImageSingleSRC', 'addParallaxImage', $imageData, $templateData);

				if ($template->parallaxImageSpeed)
				{
					$scrollSpeed = intval($template->parallaxImageSpeed);
					if ($scrollSpeed > -10 && $scrollSpeed < 10) {
						$imageData['picture']['attributes'] = $imageData['picture']['attributes'].' data-rellax-speed='.$scrollSpeed.' ';
					}
				}

				try {
					$imageElement = $this->twig->render('@HeimrichHannotContaoUtils/picture.html.twig', $imageData['picture']);
				} catch (\Exception $e) {
					$imageElement = '';
				}

				$template->imageData = $imageData;
				$template->imageElement = $imageElement;
			}
		}
	}

	/**
	 * Change article template, if parallax effect should be added.
	 *
	 * @param BackendTemplate|FrontendTemplate $template
	 */
	public function onParseTemplate($template)
	{
		// Only change template if default template
		if ($template->type == 'article' && $template->getName() == 'mod_article') {
			if ($template->addParallaxImage) {
				$template->setName('mod_article_huh_parallaximage');
			}
		}
	}
}