<?php

/**
 * Contao Open Source CMS.
 *
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 *
 * @author  Thomas Körner <t.koerner@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\ContaoParallaxImageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotContaoParallaxImageBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
