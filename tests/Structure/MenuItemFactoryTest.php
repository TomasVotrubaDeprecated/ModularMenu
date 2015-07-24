<?php

namespace Zenify\ModularMenu\Tests\Structure;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Structure\MenuItemFactory;


class MenuItemFactoryTest extends PHPUnit_Framework_TestCase
{

	public function testCreate()
	{
		$menuItemFactory = new MenuItemFactory;
		$menuItem = $menuItemFactory->create('label', 'path', 'icon');

		$this->assertSame('label', $menuItem->getLabel());
		$this->assertSame('path', $menuItem->getPath());
		$this->assertSame('icon', $menuItem->getIcon());
	}

}
