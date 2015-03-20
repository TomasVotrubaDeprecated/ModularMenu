<?php

namespace Zenify\ModularMenu\Tests\Storage;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Exceptions\MissingPositionException;
use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\Structure\MenuItemCollection;
use Zenify\ModularMenu\Tests\MenuItemStorageSource\SomeMenuItemProvider;


class MenuItemStorageTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var MenuItemStorage
	 */
	private $menuItemStorage;


	protected function setUp()
	{
		$this->menuItemStorage = new MenuItemStorage;
		$this->menuItemStorage->addMenuItemsProvider(new SomeMenuItemProvider);
	}


	public function testGetByPosition()
	{
		$menuItemCollection = $this->menuItemStorage->getByPosition('adminMenu')[0];
		$this->assertInstanceOf(MenuItemCollection::class, $menuItemCollection);
	}


	public function testGetByNonExistingPosition()
	{
		$this->setExpectedException(MissingPositionException::class);
		$this->menuItemStorage->getByPosition('frontMenu');
	}

}
