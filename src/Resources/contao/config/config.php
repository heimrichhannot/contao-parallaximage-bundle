<?php

$GLOBALS['TL_HOOKS']['compileArticle']['huh.parallaximage'] = ['huh.parallaximage.listener.hooks', 'onCompileArticle'];
$GLOBALS['TL_HOOKS']['parseTemplate']['huh.parallaximage'] = ['huh.parallaximage.listener.hooks', 'onParseTemplate'];

