<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Contract;

use Zenify\ModularMenu\Contract\Structure\MenuItemCollectionInterface;


interface MenuManagerInterface
{

    /**
     * @param string $name
     * @return MenuItemCollectionInterface[]
     */
    function getMenuStructure($name);

}
