<?php

namespace Zenify\ModularMenu\Tests\Storage;

use Assert\InvalidArgumentException;
use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Contract\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Contract\Storage\MenuItemStorageInterface;
use Zenify\ModularMenu\Exception\MissingPositionException;
use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\Structure\MenuItemCollection;
use Zenify\ModularMenu\Tests\Source\SomeMenuItemsProvider;
use Zenify\ModularMenu\Tests\Storage\MenuItemStorageSource\RankedMenuItemStorage;
use Zenify\ModularMenu\Tests\Structure\MenuItemsProvider;
use Zenify\ModularMenu\Validator\MenuItemsProviderValidator;


class MenuItemStorageTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var MenuItemStorageInterface
	 */
	private $menuItemStorage;


	protected function setUp()
	{
		$this->menuItemStorage = new MenuItemStorage(new MenuItemsProviderValidator);
		$this->menuItemStorage->addMenuItemsProvider(new SomeMenuItemsProvider);
	}


	public function testValidate()
	{
		$menuItemProviderMock = $this->prophesize(MenuItemsProviderInterface::class);
		$this->setExpectedException(InvalidArgumentException::class);
		$this->menuItemStorage->addMenuItemsProvider($menuItemProviderMock->reveal());
	}


	public function testGetByPosition()
	{
		$menuItemCollection = $this->menuItemStorage->getByPosition('adminMenu');
		$this->assertInstanceOf(MenuItemCollection::class, $menuItemCollection[0]);
	}


	public function testSameRank()
	{
		$this->menuItemStorage->addMenuItemsProvider(new RankedMenuItemStorage);
		$this->menuItemStorage->addMenuItemsProvider(new RankedMenuItemStorage);

		$this->assertCount(1, $this->menuItemStorage->getByPosition('adminMenu'));
		$this->assertCount(2, $this->menuItemStorage->getByPosition('someMenu'));
	}


	public function testGetByNonExistingPosition()
	{
		$this->setExpectedException(MissingPositionException::class);
		$this->menuItemStorage->getByPosition('frontMenu');
	}

}
