<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Storage;

use Zenify\ModularMenu\Contract\Provider\RankedMenuItemsProviderInterface;
use Zenify\ModularMenu\Contract\Storage\MenuItemStorageInterface;
use Zenify\ModularMenu\Exception\MissingPositionException;
use Zenify\ModularMenu\Contract\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Validator\MenuItemsProviderValidator;


final class MenuItemStorage implements MenuItemStorageInterface
{

	/**
	 * @var int
	 */
	const DEFAULT_RANK = 100;

	/**
	 * @var MenuItemInterface[][]
	 */
	private $menuItems;

	/**
	 * @var MenuItemsProviderValidator
	 */
	private $menuItemsProviderValidator;


	public function __construct(MenuItemsProviderValidator $menuItemsProviderValidator)
	{
		$this->menuItemsProviderValidator = $menuItemsProviderValidator;
	}


	/**
	 * {@inheritdoc}
	 */
	public function addMenuItemsProvider(MenuItemsProviderInterface $menuItemsProvider)
	{
		$this->menuItemsProviderValidator->validate($menuItemsProvider);

		$position = $menuItemsProvider->getPosition();
		$items = $menuItemsProvider->getItems();
		if ($menuItemsProvider instanceof RankedMenuItemsProviderInterface) {
			$this->menuItems[$position][$menuItemsProvider->getRank()][] = $items;

		} else {
			$this->menuItems[$position][self::DEFAULT_RANK][] = $items;
		}
	}


	/**
	 * {@inheritdoc}
	 */
	public function getByPosition($position)
	{
		if (isset($this->menuItems[$position])) {
			$menuItemsGroups = $this->menuItems[$position];
			ksort($menuItemsGroups);

			$menuItemCollections = [];
			foreach ($menuItemsGroups as $priority => $menuItemsGroup) {
				foreach ($menuItemsGroup as $menuItemCollection) {
					$menuItemCollections[] = $menuItemCollection;
				}
			}
			return $menuItemCollections;
		}

		throw new MissingPositionException(
			sprintf('Position "%s" was not found.', $position)
		);
	}

}
