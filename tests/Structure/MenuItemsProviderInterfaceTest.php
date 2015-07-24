<?php

namespace Zenify\ModularMenu\Tests\Structure;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Contract\Structure\MenuItemCollectionInterface;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Tests\Source\SomeMenuItemsProvider;


class MenuItemsProvider extends PHPUnit_Framework_TestCase
{

	public function testGetters()
	{
		$blogMenuItemsProvider = new SomeMenuItemsProvider;

		$this->assertSame('adminMenu', $blogMenuItemsProvider->getPosition());

		$items = $blogMenuItemsProvider->getItems();
		$this->assertInstanceOf(MenuItemCollectionInterface::class, $items);
		foreach ($items as $item) {
			$this->assertInstanceOf(MenuItem::class, $item);
		}
	}

}
