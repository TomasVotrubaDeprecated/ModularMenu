<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Validator;

use Zenify\ModularMenu\Exceptions\InvalidArgumentException;
use Zenify\ModularMenu\Provider\MenuItemsProviderInterface;
use Zenify\ModularMenu\Structure\MenuItem;
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
		if ($items === []) {
			return TRUE;
		}

		if ( ! is_object($items)) {
			throw new InvalidArgumentException(
				sprintf('Object expected. "%s" given.', $items)
			);
		}


		if ( ! $items instanceof MenuItemCollectionInterface) {
			throw new InvalidArgumentException(
				sprintf('"%s" expected. "%s" given.', MenuItemCollectionInterface::class, get_class($items))
			);
		}

		foreach ($items as $item) {
			if ( ! $item instanceof MenuItem) {
				throw new InvalidArgumentException(
					sprintf(
						'"%s" expected. "%s" given.', MenuItem::class, is_object($item) ? get_class($item) : $item
					)
				);
			}
		}

		return TRUE;
	}

}
