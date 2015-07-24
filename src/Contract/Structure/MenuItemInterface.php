<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Contract\Structure;


interface MenuItemInterface
{

    /**
     * @return string
     */
    function getLabel();


    /**
     * @return string
     */
    function getIcon();

}
