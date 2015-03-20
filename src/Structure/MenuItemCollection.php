<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Structure;

use ArrayIterator;


class MenuItemCollection implements MenuItemCollectionInterface
{

	/**
	 * @var MenuItem[]
	 */
	private $menuItems;


	/**
	 * @param MenuItem[] $menuItems
	 */
	public function __construct(array $menuItems)
	{
		$this->menuItems = $menuItems;
	}


	/**
	 * {@inheritdoc}
	 */
	public function getIterator()
	{
		return new ArrayIterator($this->menuItems);
	}

}
