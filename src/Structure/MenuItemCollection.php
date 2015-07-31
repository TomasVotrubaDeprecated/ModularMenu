<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Structure;

use ArrayIterator;
use Assert\Assertion;
use Zenify\ModularMenu\Contract\Structure\MenuItemCollectionInterface;
use Zenify\ModularMenu\Contract\Structure\MenuItemInterface;


final class MenuItemCollection implements MenuItemCollectionInterface
{

	/**
	 * @var MenuHeadline
	 */
	private $menuHeadline;

	/**
	 * @var MenuItemInterface[]
	 */
	private $menuItems;


	/**
	 * @param MenuItemInterface[] $menuItems
	 */
	public function __construct(array $menuItems)
	{
		Assertion::allIsInstanceOf($menuItems, MenuItemInterface::class);
		foreach ($menuItems as $key => $menuItem) {
			if ($menuItem instanceof MenuHeadline) {
				$this->menuHeadline = $menuItem;
				unset($menuItems[$key]);
			}
		}
		$this->menuItems = $menuItems;
	}


	/**
	 * {@inheritdoc}
	 */
	public function getIterator()
	{
		return new ArrayIterator($this->menuItems);
	}


	/**
	 * {@inheritdoc}
	 */
	public function hasHeadline()
	{
		return ($this->menuHeadline instanceof MenuHeadline);
	}


	/**
	 * {@inheritdoc}
	 */
	public function getHeadline()
	{
		return $this->menuHeadline;
	}

}
