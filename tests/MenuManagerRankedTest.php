<?php

namespace Zenify\ModularMenu\Tests;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Contract\Structure\MenuItemCollectionInterface;
use Zenify\ModularMenu\Contract\Structure\MenuItemInterface;
use Zenify\ModularMenu\MenuManager;
use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\Structure\MenuItemCollection;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider2;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider3;


class MenuManagerRankedTest extends PHPUnit_Framework_TestCase
{

	public function testGetMenuStructureOrderedByRank()
	{
		$menuItemStorage = new MenuItemStorage;
		$menuItemStorage->addMenuItemsProvider(new RankedMenuItemsProvider3);
		$menuItemStorage->addMenuItemsProvider(new RankedMenuItemsProvider);
		$menuItemStorage->addMenuItemsProvider(new RankedMenuItemsProvider2);
		$menuManager = new MenuManager($menuItemStorage);

		/** @var MenuItemCollectionInterface[] $menuItemGroups */
		$menuItemGroups = $menuManager->getMenuStructure('rankedMenu');

		/** @var MenuItemInterface[] $items */
		$items = $menuItemGroups[0]->getIterator();
		$this->assertSame('Label', $items[0]->getLabel());

		/** @var MenuItemInterface[] $items */
		$items = $menuItemGroups[1]->getIterator();
		$this->assertSame('Label 2', $items[0]->getLabel());

		/** @var MenuItemInterface[] $items */
		$items = $menuItemGroups[2]->getIterator();
		$this->assertSame('Label 3', $items[0]->getLabel());

	}

}
