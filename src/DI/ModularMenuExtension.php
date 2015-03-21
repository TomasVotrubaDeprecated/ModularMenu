<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\DI;

use Nette\DI\CompilerExtension;
use Nette\DI\ServiceDefinition;
use Nette\Reflection\ClassType;
use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Storage\MenuItemStorage;
use Zenify\ModularMenu\Validator\MenuItemsProviderValidator;


class ModularMenuExtension extends CompilerExtension
{

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$services = $this->loadFromFile(__DIR__ . '/services.neon');
		$this->compiler->parseServices($builder, $services);
	}


	public function beforeCompile()
	{
		$builder = $this->getContainerBuilder();
		$builder->prepareClassList();

		$menuItemsProviders = $builder->findByType(MenuItemsProviderInterface::class);

		$menuStorageDefinition = $builder->getDefinition($builder->getByType(MenuItemStorage::class));
		foreach ($menuItemsProviders as $menuItemsProvider) {
			$this->validateMenuItemsProvider($menuItemsProvider);
			$menuStorageDefinition->addSetup('addMenuItemsProvider', [$menuItemsProvider->getClass()]);
		}
	}


	public function validateMenuItemsProvider(ServiceDefinition $menuItemsProviderDefinition)
	{
		$class = $menuItemsProviderDefinition->getClass();

		/** @var MenuItemsProviderInterface $menuItemsProvider */
		$menuItemsProvider = ClassType::from($class)->newInstanceWithoutConstructor();
		$validator = new MenuItemsProviderValidator;
		$validator->validate($menuItemsProvider);
	}

}
