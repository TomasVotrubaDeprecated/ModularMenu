<?php

namespace Zenify\ModularMenu\Tests\Structure;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Structure\MenuItemCollection;


class MenuItemCollectionTest extends PHPUnit_Framework_TestCase
{

	public function testIterator()
	{
		$menuItems[] = new MenuItem('label', 'path');
		$menuItemCollection = new MenuItemCollection($menuItems);
		$this->assertCount(1, $menuItemCollection->getIterator());
	}

}
