<?php

namespace Zenify\ModularMenu\Tests\MenuManagerRankedSource;

use Zenify\ModularMenu\Contract\Provider\RankedMenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\MenuItem;
use Zenify\ModularMenu\Structure\MenuItemCollection;


class RankedMenuItemsProvider implements RankedMenuItemsProviderInterface
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
			new MenuItem('Label', ':Module:Presenter:')
		]);
	}


	/**
	 * {@inheritdoc}
	 */
	public function getRank()
	{
		return 1;
	}

}
