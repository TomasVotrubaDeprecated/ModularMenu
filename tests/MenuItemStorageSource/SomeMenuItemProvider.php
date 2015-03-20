<?php

namespace Zenify\ModularMenu\Tests\MenuItemStorageSource;

use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Structure\MenuItemCollection;


class SomeMenuItemProvider implements MenuItemsProviderInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getPosition()
	{
		return 'adminMenu';
	}


	/**
	 * {@inheritdoc}
	 */
	public function getItems()
	{
		return new MenuItemCollection([
			new MenuItem('Label', ':Module:Presenter:')
		]);
	}

}
