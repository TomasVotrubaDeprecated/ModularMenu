<?php

namespace Zenify\ModularMenu\Tests\DI\ModularMenuExtensionSource;

use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;


class SomeMenuItemsProvider implements MenuItemsProviderInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getPosition()
	{
	}


	/**
	 * {@inheritdoc}
	 */
	public function getItems()
	{
		return [];
	}

}
