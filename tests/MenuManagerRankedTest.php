<?php

namespace Zenify\ModularMenu\Tests;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Contract\Structure\MenuItemCollectionInterface;
use Zenify\ModularMenu\MenuManager;
use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider2;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider3;
use Zenify\ModularMenu\Validator\MenuItemsProviderValidator;


class MenuManagerRankedTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var MenuItemStorage
	 */
	private $menuItemStorage;


	protected function setUp()
	{
		$menuItemsProviderValidator = new MenuItemsProviderValidator;
		$this->menuItemStorage = new MenuItemStorage($menuItemsProviderValidator);
	}


	public function testGetMenuStructureOrderedByRank()
	{
		$this->menuItemStorage->addMenuItemsProvider(new RankedMenuItemsProvider3);
		$this->menuItemStorage->addMenuItemsProvider(new RankedMenuItemsProvider);
		$this->menuItemStorage->addMenuItemsProvider(new RankedMenuItemsProvider2);
		$menuManager = new MenuManager($this->menuItemStorage);

		/** @var MenuItemCollectionInterface[] $menuItemGroups */
		$menuItemGroups = $menuManager->getMenuStructure('rankedMenu');

		$this->assertFirstItemHasLabel($menuItemGroups[0][0], 'Label');
		$this->assertFirstItemHasLabel($menuItemGroups[1][0], 'Label 2');
		$this->assertFirstItemHasLabel($menuItemGroups[2][0], 'Label 3');
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
