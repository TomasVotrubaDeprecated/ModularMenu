<?php

namespace Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource;

use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Structure\MenuItemCollection;


class ValidProvider3 implements MenuItemsProviderInterface
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
		return new MenuItemCollection([
			new MenuItem('label', 'path')
		]);
	}

}
