<?php

namespace HeimrichHannot\ContaoParallaxImageBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Image\Studio\Studio;
use Contao\Module;
use Contao\FrontendTemplate;
use HeimrichHannot\EncoreContracts\PageAssetsTrait;
use Symfony\Contracts\Service\ServiceSubscriberInterface;
use Twig\Environment;

#[AsHook('compileArticle')]
class CompileArticleListener implements ServiceSubscriberInterface
{
    use PageAssetsTrait;

    public function __construct(
        private readonly Studio $studio,
        private readonly Environment $twig,
    )
    {
    }

    public function __invoke(FrontendTemplate $template, array $data, Module $module): void
    {
        if (!$template->addParallaxImage) {
            return;
        }

        $figureBuilder = $this->studio->createFigureBuilder()
            ->from($template->parallaxImageSingleSRC)
            ->setSize($module->getModel()->parallaxImageSize);

        $options = [];

        if ($template->parallaxImageSpeed) {
            $scrollSpeed = intval($template->parallaxImageSpeed);
            if ($scrollSpeed > -10 && $scrollSpeed < 10) {
                $options['img_attr']['data-rellax-speed'] = $scrollSpeed;
            }
        }
        $figure = $figureBuilder
            ->setOptions($options)
            ->buildIfResourceExists();

        if (!$figure) {
            return;
        }

        $this->addPageEntrypoint('contao-parallaximage-bundle', [
            'TL_CSS' => [
                'contao-parallaximage-bundle' => 'bundles/heimrichhannotcontaoparallaximage/assets/contao-parallaximage-bundle.css'
            ],
            'TL_JAVASCRIPT' => [
                'contao-parallaximage-bundle' => 'bundles/heimrichhannotcontaoparallaximage/assets/contao-parallaximage-bundle.js'
            ],
        ]);

        $image = $this->twig->render('@ContaoCore/Image/Studio/figure.html.twig', ['figure' => $figure]);

        $module->getModel()->classes = array_merge($module->getModel()->classes ?? [], ['parallax-background']);
        $prepend = ['<div class="parallax-image">' . $image . '</div><div class="parallax-content">'];
        $append = ['</div>'];

        $template->elements = array_merge($prepend, $template->elements, $append);
    }
}