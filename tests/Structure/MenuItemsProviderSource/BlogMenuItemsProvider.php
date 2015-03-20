<?php

namespace Zenify\ModularMenu\Tests\Structure\MenuItemsProviderSource;

use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Structure\MenuItemCollection;


class BlogMenuItemsProvider implements MenuItemsProviderInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getPosition()
	{
		return 'leftAdminMenu';
	}


	/**
	 * {@inheritdoc}
	 */
	public function getItems()
	{
		return new MenuItemCollection([
			new MenuItem('Articles', ':Blog:Article:'),
			new MenuItem('Categories', ':Blog:Category:')
		]);
	}

}
