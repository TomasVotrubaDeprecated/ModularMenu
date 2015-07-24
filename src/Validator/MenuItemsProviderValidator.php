<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Validator;

use Zenify\ModularMenu\Exception\InvalidArgumentException;
use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\AbstractMenuItem;
use Zenify\ModularMenu\Structure\MenuItemCollectionInterface;


class MenuItemsProviderValidator
{

	public function validate(MenuItemsProviderInterface $provider)
	{
		return $this->validateItems($provider->getItems());
	}


	/**
	 * @param mixed $items
	 * @throws InvalidArgumentException
	 * @return bool
	 */
	private function validateItems($items)
	{
		if ($items !== []) {
			$this->validateIsObject($items);
			$this->validateMenuItemCollection($items);
			$this->validateMenuItems($items);
		}

		return TRUE;
	}


	/**
	 * @param mixed $items
	 */
	private function validateIsObject($items)
	{
		if ( ! is_object($items)) {
			throw new InvalidArgumentException(
				sprintf('Object expected. "%s" given.', $items)
			);
		}
	}


	/**
	 * @param mixed $items
	 */
	private function validateMenuItemCollection($items)
	{
		if ( ! $items instanceof MenuItemCollectionInterface) {
			throw new InvalidArgumentException(
				sprintf('"%s" expected. "%s" given.', MenuItemCollectionInterface::class, get_class($items))
			);
		}
	}


	private function validateMenuItems(MenuItemCollectionInterface $items)
	{
		foreach ($items as $item) {
			if ( ! $item instanceof AbstractMenuItem) {
				throw new InvalidArgumentException(
					sprintf(
						'Child of "%s" expected. "%s" given.', AbstractMenuItem::class, is_object($item) ? get_class($item) : $item
					)
				);
			}
		}
	}

}
