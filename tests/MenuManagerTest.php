<?php

namespace Zenify\ModularMenu\Tests;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Exceptions\MissingPositionException;
use Zenify\ModularMenu\MenuManager;
use Zenify\ModularMenu\Storage\MenuItemStorage;


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
		$this->setExpectedException(MissingPositionException::class);
		$this->menuManager->getMenuStructure('nonExistingPosition');
	}

}
