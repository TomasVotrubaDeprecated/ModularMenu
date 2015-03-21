<?php

namespace Zenify\ModularMenu\Tests;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\MenuManager;
use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider2;
use Zenify\ModularMenu\Tests\MenuManagerRankedSource\RankedMenuItemsProvider3;


class MenuManagerRankedTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var MenuManager
	 */
	private $menuManager;


	protected function setUp()
	{
		$menuItemStorage = new MenuItemStorage;
		$menuItemStorage->addMenuItemsProvider(new RankedMenuItemsProvider3);
		$menuItemStorage->addMenuItemsProvider(new RankedMenuItemsProvider);
		$menuItemStorage->addMenuItemsProvider(new RankedMenuItemsProvider2);
		$this->menuManager = new MenuManager($menuItemStorage);
	}


	public function testGetMenuStructureOrderedByRank()
	{
		$menuItemGroups = $this->menuManager->getMenuStructure('rankedMenu');
		$this->assertSame([1, 10, 100], array_keys($menuItemGroups));
	}

}
