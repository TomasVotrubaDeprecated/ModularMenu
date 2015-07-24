<?php

namespace Zenify\ModularMenu\Tests\Storage\MenuItemStorageSource;

use Zenify\ModularMenu\Contract\Provider\RankedMenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Structure\MenuItemCollection;


class RankedMenuItemStorage implements RankedMenuItemsProviderInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getPosition()
	{
		return 'someMenu';
	}


	/**
	 * {@inheritdoc}
	 */
	public function getItems()
	{
		return new MenuItemCollection([new MenuItem('label', 'path')]);
	}


	/**
	 * {@inheritdoc}
	 */
	public function getRank()
	{
		return 500;
	}

}
