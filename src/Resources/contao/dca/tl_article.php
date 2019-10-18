<?php
\Contao\System::loadLanguageFile('tl_content');

$dca = &$GLOBALS['TL_DCA']['tl_article'];

$dca['palettes']['__selector__'][] = 'addParallaxImage';

$dca['palettes']['default'] = str_replace(
	'{syndication_legend}',
	'{parallaxImage_legend:hide},addParallaxImage;{syndication_legend}',
	$dca['palettes']['default']
);
$dca['subpalettes']['addParallaxImage'] = 'parallaxImageSingleSRC,parallaxImageSize,parallaxImageSpeed';

$dca['fields']['addParallaxImage']       = [
	'label'     => &$GLOBALS['TL_LANG']['tl_article']['addParallaxImage'],
	'exclude'   => true,
	'inputType' => 'checkbox',
	'eval'      => ['submitOnChange' => true],
	'sql'       => "char(1) NOT NULL default ''",
];
$dca['fields']['parallaxImageSingleSRC'] = [
	'label'     => &$GLOBALS['TL_LANG']['tl_article']['parallaxImageSingleSRC'],
	'exclude'   => true,
	'inputType' => 'fileTree',
	'eval'      => ['filesOnly' => true, 'fieldType' => 'radio', 'mandatory' => true, 'tl_class' => 'clr'],
	'sql'       => "binary(16) NULL",
];
$dca['fields']['parallaxImageSize']         = [
	'label'            => &$GLOBALS['TL_LANG']['tl_content']['size'],
	'exclude'          => true,
	'inputType'        => 'imageSize',
	'reference'        => &$GLOBALS['TL_LANG']['MSC'],
	'eval'             => ['rgxp' => 'natural', 'includeBlankOption' => true, 'nospace' => true, 'helpwizard' => true, 'tl_class' => 'w50'],
	'options_callback' => function () {
		return System::getContainer()->get('contao.image.image_sizes')->getOptionsForUser(BackendUser::getInstance());
	},
	'sql'              => "varchar(64) NOT NULL default ''"
];
$dca['fields']['parallaxImageSpeed']         = [
	'label'            => &$GLOBALS['TL_LANG']['tl_article']['parallaxImageSpeed'],
	'exclude'          => true,
	'inputType'        => 'text',
	'reference'        => &$GLOBALS['TL_LANG']['MSC'],
	'eval'             => ['rgxp' => 'digit', 'nospace' => true, 'tl_class' => 'w50 clr', 'maxlength' => 4],
	'sql'              => "varchar(5) NOT NULL default ''"
];