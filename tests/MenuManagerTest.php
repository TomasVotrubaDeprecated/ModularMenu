<?php

namespace Zenify\ModularMenu\Tests;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Exceptions\MissingPositionException;
use Zenify\ModularMenu\MenuManager;
use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\Structure\MenuItemCollection;
use Zenify\ModularMenu\Tests\Source\SomeMenuItemsProvider;


class MenuManagerTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var MenuManager
	 */
	private $menuManager;


	protected function setUp()
	{
		$menuItemStorage = new MenuItemStorage;
		$menuItemStorage->addMenuItemsProvider(new SomeMenuItemsProvider);
		$this->menuManager = new MenuManager($menuItemStorage);
	}


	public function testGetMenuStructure()
	{
		$menuItemGroups = $this->menuManager->getMenuStructure('adminMenu');
		$this->assertCount(1, $menuItemGroups);
		foreach ($menuItemGroups as $menuItemCollection) {
			$this->assertInstanceOf(MenuItemCollection::class, $menuItemCollection);
		}
	}


	public function testGetMenuStructureForNonExistingLocation()
	{
		$this->setExpectedException(MissingPositionException::class);
		$this->menuManager->getMenuStructure('nonExistingPosition');
	}

}
