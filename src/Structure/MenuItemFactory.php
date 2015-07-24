<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Structure;

use Zenify\ModularMenu\Contract\Structure\MenuItemFactoryInterface;


final class MenuItemFactory implements MenuItemFactoryInterface
{

    /**
     * {@inheritdoc}
     */
	public function create($label, $path, $icon = NULL)
    {
        return new MenuItem($label, $path, $icon);
    }

}
