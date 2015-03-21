<?php

namespace Zenify\ModularMenu\Tests\DI\ModularMenuExtension;

use Nette\DI\Compiler;
use Nette\DI\ContainerBuilder;
use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\DI\ModularMenuExtension;
use Zenify\ModularMenu\Exceptions\InvalidArgumentException;
use Zenify\ModularMenu\Tests\DI\ModularMenuExtension\ValidationSource\InvalidProvider;
use Zenify\ModularMenu\Tests\Source\SomeMenuItemsProvider;


class ValidationTest extends PHPUnit_Framework_TestCase
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


	public function testValidation()
	{
		$this->extension->loadConfiguration();

		$builder = $this->extension->getContainerBuilder();
		$builder->addDefinition('someMenuItemsProvider')
			->setClass(InvalidProvider::class);

		$this->setExpectedException(InvalidArgumentException::class);
		$this->extension->beforeCompile();
	}

}
