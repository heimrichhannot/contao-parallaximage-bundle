<?php

$GLOBALS['TL_HOOKS']['compileArticle']['huh.parallaximage'] = ['huh.parallaximage.listener.hooks', 'onCompileArticle'];
$GLOBALS['TL_HOOKS']['parseTemplate']['huh.parallaximage'] = ['huh.parallaximage.listener.hooks', 'onParseTemplate'];

$GLOBALS['TL_JAVASCRIPT']['huh_contaoParallaxImageBundle']        = 'bundles/heimrichhannotcontaoparallaximage/js/contaoParallaxImageBundle.min.js|static';
$GLOBALS['TL_CSS']['huh_contaoParallaxImageBundle']        = 'bundles/heimrichhannotcontaoparallaximage/css/contaoParallaxImageBundle.css|static';