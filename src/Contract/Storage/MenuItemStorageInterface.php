<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Contract\Storage;

use Zenify\ModularMenu\Contract\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Contract\Structure\MenuItemCollectionInterface;


interface MenuItemStorageInterface
{

	function addMenuItemsProvider(MenuItemsProviderInterface $menuItemsProvider);


	/**
	 * @param string $position
	 * @return MenuItemCollectionInterface[]
	 */
	function getByPosition($position);

}
