<?php

namespace Zenify\ModularMenu\Tests\MenuManagerRankedSource;

use Zenify\ModularMenu\Provider\RankedMenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Structure\MenuItemCollection;


class RankedMenuItemsProvider3 implements RankedMenuItemsProviderInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getPosition()
	{
		return 'rankedMenu';
	}


	/**
	 * {@inheritdoc}
	 */
	public function getItems()
	{
		return new MenuItemCollection([
			new MenuItem('Label 3', ':Module:Presenter:')
		]);
	}


	/**
	 * {@inheritdoc}
	 */
	public function getRank()
	{
		return 100;
	}

}
