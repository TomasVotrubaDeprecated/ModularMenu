<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu;

use Zenify\ModularMenu\Contract\MenuManagerInterface;
use Zenify\ModularMenu\Contract\Storage\MenuItemStorageInterface;


final class MenuManager implements MenuManagerInterface
{

	/**
	 * @var MenuItemStorageInterface
	 */
	private $menuItemsStorage;


	public function __construct(MenuItemStorageInterface $menuItemsStorage)
	{
		$this->menuItemsStorage = $menuItemsStorage;
	}


	/**
	 * {@inheritdoc}
	 */
	public function getMenuStructure($name)
	{
		return $this->menuItemsStorage->getByPosition($name);
	}

}
