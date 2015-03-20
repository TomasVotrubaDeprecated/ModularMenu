<?php

namespace Zenify\ModularMenu\Tests\Structure;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Structure\MenuItemCollectionInterface;
use Zenify\ModularMenu\Tests\Structure\MenuItemsProviderSource\BlogMenuItemsProvider;


class MenuItemsProvider extends PHPUnit_Framework_TestCase
{

	public function testGetters()
	{
		$blogMenuItemsProvider = new BlogMenuItemsProvider;

		$this->assertSame('leftAdminMenu', $blogMenuItemsProvider->getPosition());

		$items = $blogMenuItemsProvider->getItems();
		$this->assertInstanceOf(MenuItemCollectionInterface::class, $items);
		foreach ($items as $item) {
			$this->assertInstanceOf(MenuItem::class, $item);
		}
	}

}
