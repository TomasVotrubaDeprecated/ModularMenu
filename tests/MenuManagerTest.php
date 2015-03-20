<?php

namespace Zenify\ModularMenu\Tests;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\MenuManager;


class MenuManagerTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var MenuManager
	 */
	private $menuManager;


	protected function setUp()
	{
		$this->menuManager = new MenuManager(new MenuItemStorage);
	}


	public function testGetMenuStructureForNonExistingLocation()
	{
		$this->assertFalse($this->menuManager->getMenuStructure('...'));
	}

}
