<?php

namespace Zenify\ModularMenu\Tests\Validator;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Exceptions\InvalidArgumentException;
use Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource\InvalidProvider;
use Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource\InvalidProvider2;
use Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource\InvalidProvider3;
use Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource\InvalidProvider4;
use Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource\ValidProvider;
use Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource\ValidProvider2;
use Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource\ValidProvider3;
use Zenify\ModularMenu\Validator\MenuItemsProviderValidator;


class MenuItemsProviderValidatorTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var MenuItemsProviderValidator
	 */
	private $menuItemsProviderValidator;


	protected function setUp()
	{
		$this->menuItemsProviderValidator = new MenuItemsProviderValidator;
	}


	public function testValidateValidProviders()
	{
		$validProvider = new ValidProvider;
		$this->assertTrue($this->menuItemsProviderValidator->validate($validProvider));

		$validProvider2 = new ValidProvider2;
		$this->assertTrue($this->menuItemsProviderValidator->validate($validProvider2));

		$validProvider3 = new ValidProvider3;
		$this->assertTrue($this->menuItemsProviderValidator->validate($validProvider3));
	}


	public function testValidateInvalidProvider()
	{
		$invalidProvider = new InvalidProvider;
		$this->setExpectedException(InvalidArgumentException::class, 'Object expected. "..." given.');
		$this->menuItemsProviderValidator->validate($invalidProvider);
	}


	public function testValidateInvalidProvider2()
	{
		$invalidProvider2 = new InvalidProvider2;
		$this->setExpectedException(
			InvalidArgumentException::class,
			'"Zenify\ModularMenu\Structure\MenuItem" expected. "..." given.'
		);
		$this->menuItemsProviderValidator->validate($invalidProvider2);
	}


	public function testValidateInvalidProvider3()
	{
		$invalidProvider3 = new InvalidProvider3;
		$this->setExpectedException(
			InvalidArgumentException::class,
			'"Zenify\ModularMenu\Structure\MenuItem" expected. "stdClass" given.'
		);
		$this->menuItemsProviderValidator->validate($invalidProvider3);
	}


	public function testValidateInvalidProvider4()
	{
		$invalidProvider4 = new InvalidProvider4;
		$this->setExpectedException(
			InvalidArgumentException::class,
			'"Zenify\ModularMenu\Structure\MenuItemCollectionInterface" expected. "stdClass" given.'
		);
		$this->menuItemsProviderValidator->validate($invalidProvider4);
	}

}
