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

		$this->assertFirstItemHasLabel($menuItemGroups[0], 'Label');
		$this->assertFirstItemHasLabel($menuItemGroups[1], 'Label 2');
		$this->assertFirstItemHasLabel($menuItemGroups[2], 'Label 3');

	}


	/**
	 * @param MenuItemCollectionInterface $menuItemCollection
	 * @param string $label
	 */
	private function assertFirstItemHasLabel(MenuItemCollectionInterface $menuItemCollection, $label)
	{
		$items = $menuItemCollection->getIterator();
		$this->assertSame($label, $items[0]->getLabel());
	}

}
