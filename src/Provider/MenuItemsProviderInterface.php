<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Provider;

use Zenify\ModularMenu\Structure\MenuItemCollectionInterface;


interface MenuItemsProviderInterface
{

	/**
	 * Name of menu position (e.g. frontTopMenu, adminLeftMenu).
	 *
	 * @return string
	 */
	function getPosition();


	/**
	 * @return MenuItemCollectionInterface[]
	 */
	function getItems();

}
