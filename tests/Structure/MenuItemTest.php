<?php

namespace Zenify\ModularMenu\Tests\Structure;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Structure\MenuItem;


class MenuItemTest extends PHPUnit_Framework_TestCase
{

	public function testGetters()
	{
		$menuItem = new MenuItem('Label', ':Module:Presenter:action', 'fa fa-user');

		$this->assertSame(':Module:Presenter:action', $menuItem->getPath());
		$this->assertSame('Label', $menuItem->getLabel());
		$this->assertSame('fa fa-user', $menuItem->getIcon());
	}

}
