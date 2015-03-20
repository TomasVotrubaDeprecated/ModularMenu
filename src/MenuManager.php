<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu;

use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\Structure\MenuItem;


class MenuManager
{

	/**
	 * @var MenuItemStorage
	 */
	private $menuItemsStorage;


	public function __construct(MenuItemStorage $menuItemsStorage)
	{
		$this->menuItemsStorage = $menuItemsStorage;
	}


	/**
	 * @param string $name
	 * @return bool|MenuItem[]
	 */
	public function getMenuStructure($name)
	{
		return $this->menuItemsStorage->getByPosition($name);
	}

}
