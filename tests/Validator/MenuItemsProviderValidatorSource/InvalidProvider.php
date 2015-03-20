<?php

namespace Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource;

use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;


class InvalidProvider implements MenuItemsProviderInterface
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
		return '...';
	}

}
