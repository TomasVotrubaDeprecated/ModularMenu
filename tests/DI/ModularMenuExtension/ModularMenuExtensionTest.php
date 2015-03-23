<?php

namespace Zenify\ModularMenu\Tests\DI\ModularMenuExtension;

use Nette\DI\Compiler;
use Nette\DI\ContainerBuilder;
use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\DI\ModularMenuExtension;
use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\Tests\Source\SomeMenuItemsProvider;


class ModularMenuExtensionTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var ModularMenuExtension
	 */
	private $extension;


	protected function setUp()
	{
		$this->extension = new ModularMenuExtension;
		$this->extension->setCompiler(new Compiler(new ContainerBuilder), 'compiler');
	}


	public function testLoadConfiguration()
	{
		$this->extension->loadConfiguration();

		$builder = $this->extension->getContainerBuilder();
		$builder->prepareClassList();

		$this->assertSame(
			MenuItemStorage::class,
			$builder->getDefinition($builder->getByType(MenuItemStorage::class))->getClass()
		);
	}


	public function testBeforeCompile()
	{
		$this->extension->loadConfiguration();

		$builder = $this->extension->getContainerBuilder();
		$builder->addDefinition('someMenuItemsProvider')
			->setClass(SomeMenuItemsProvider::class);

		$this->extension->beforeCompile();

		$builder->prepareClassList();
		$storageDefinition = $builder->getDefinition($builder->getByType(MenuItemStorage::class));
		$storageDefinitionSetup = $storageDefinition->getSetup();
		$this->assertSame(
			'@' . SomeMenuItemsProvider::class,
			$storageDefinitionSetup[0]->arguments[0]
		);
	}

}
