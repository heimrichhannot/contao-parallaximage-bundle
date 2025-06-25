<?php

namespace HeimrichHannot\ContaoParallaxImageBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Image\Studio\Studio;
use Contao\Module;
use Contao\FrontendTemplate;
use Twig\Environment;

#[AsHook('compileArticle')]
class CompileArticleListener
{
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
            ->setSize($module->parallaxImageSize);

        $options = [];

        if ($template->parallaxImageSpeed) {
            $scrollSpeed = intval($template->parallaxImageSpeed);
            if ($scrollSpeed > -10 && $scrollSpeed < 10) {
                $options['attr']['data-rellax-speed'] = $scrollSpeed;
            }
        }
        $figure = $figureBuilder
            ->setOptions($options)
            ->buildIfResourceExists();

        if (!$figure) {
            return;
        }

        $image = $this->twig->render('@ContaoCore/Image/Studio/figure.html.twig', ['figure' => $figure]);

        $template->class = trim($template->class . ' parallax-background');
        $prepend = ['<div class="parallax-image">' . $image . '</div><div class="parallax-content">'];
        $append = ['</div>'];

        $template->elements = array_merge($prepend, $template->elements, $append);
    }
}