<?php

namespace Zenify\ModularMenu\Tests\Structure;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Structure\MenuHeadline;
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


	public function testHasHeadline()
	{
		$menuItems[] = new MenuHeadline('label');
		$menuItems[] = new MenuItem('label', 'path');
		$menuItemCollection = new MenuItemCollection($menuItems);
		$this->assertTrue($menuItemCollection->hasHeadline());
	}


	public function testGetHeadline()
	{
		$menuItems[] = new MenuHeadline('label', 'icon');
		$menuItems[] = new MenuItem('label', 'path');
		$menuItemCollection = new MenuItemCollection($menuItems);
		$this->assertInstanceOf(MenuHeadline::class, $menuItemCollection->getHeadline());
		$this->assertSame('label', $menuItemCollection->getHeadline()->getLabel());
		$this->assertSame('icon', $menuItemCollection->getHeadline()->getIcon());
	}

}
