<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2025 Heimrich & Hannot GmbH
 * @package contao
 * @author David Skorupko <d.skorupko@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\ContaoParallaxImageBundle\Asset;

use HeimrichHannot\EncoreContracts\EncoreEntry;
use HeimrichHannot\EncoreContracts\EncoreExtensionInterface;
use HeimrichHannot\ContaoParallaxImage\ContaoParallaxImageBundle;

class EncoreExtension implements EncoreExtensionInterface
{
    public function getBundle(): string
    {
        return ContaoParallaxImageBundle::class;
    }

    public function getEntries(): array
    {
        return [
            // this will generate an entrypoint called "main-theme"
            EncoreEntry::create('contao-parallaximage-bundle', 'src/Resources/assets/js/contao-parallaximage-bundle.js')
                ->setRequiresCss(true)
                // false by default, so this loads at the bottom of the page
                ->setIsHeadScript(false)
                ->addJsEntryToRemoveFromGlobals('huh.contao-parallaximage-bundle')
                ->addCssEntryToRemoveFromGlobals('huh.contao-parallaximage-bundle')
                ->addJsEntryToRemoveFromGlobals('huh.contao-parallaximage-bundle')
            ,
        ];
    }
}
