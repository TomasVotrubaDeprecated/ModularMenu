<?php

namespace Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource;

use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\MenuItemCollection;


class InvalidProvider2 implements MenuItemsProviderInterface
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
		return new MenuItemCollection(['...']);
	}

}
