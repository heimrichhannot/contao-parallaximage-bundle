<?php

/**
 * Contao Open Source CMS.
 *
 * Copyright (c) 2025 Heimrich & Hannot GmbH
 *
 * @author David Skorupko <d.skorupko@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\ContaoParallaxImageBundle\Asset;

use HeimrichHannot\ContaoParallaxImageBundle\HeimrichHannotContaoParallaxImageBundle;
use HeimrichHannot\EncoreContracts\EncoreEntry;
use HeimrichHannot\EncoreContracts\EncoreExtensionInterface;

class EncoreExtension implements EncoreExtensionInterface
{
    public function getBundle(): string
    {
        // Return your bundle’s main class
        return HeimrichHannotContaoParallaxImageBundle::class;
    }

    public function getEntries(): array
    {
        return [
            EncoreEntry::create('contao-parallaximage-bundle', 'assets/js/contao-parallaximage-bundle.js')
                ->setRequiresCss(true)
                ->setIsHeadScript(false)
                ->addJsEntryToRemoveFromGlobals('contao-parallaximage-bundle')
                ->addCssEntryToRemoveFromGlobals('contao-parallaximage-bundle'),
        ];
    }
}
