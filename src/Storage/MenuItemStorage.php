<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Storage;

use Zenify\ModularMenu\Exceptions\MissingPositionException;
use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Provider\RankedMenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider;


class MenuItemStorage
{

	/**
	 * @var MenuItem[][]
	 */
	private $menuItems;


	public function addMenuItemsProvider(MenuItemsProviderInterface $menuItemsProvider)
	{
		if ($menuItemsProvider instanceof RankedMenuItemsProviderInterface) {
			$this->menuItems[$menuItemsProvider->getPosition()][$menuItemsProvider->getRank()] = $menuItemsProvider->getItems();

		} else {
			$this->menuItems[$menuItemsProvider->getPosition()][] = $menuItemsProvider->getItems();
		}
	}


	/**
	 * @param string $position
	 * @return MenuItem[]|bool
	 */
	public function getByPosition($position)
	{
		if (isset($this->menuItems[$position])) {
			$menuItemsGroups = $this->menuItems[$position];
			ksort($menuItemsGroups);
			return $menuItemsGroups;
		}

		throw new MissingPositionException(
			sprintf('Position "%s" was not found.', $position)
		);
	}

}
