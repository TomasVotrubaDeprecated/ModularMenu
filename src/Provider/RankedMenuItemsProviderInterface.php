<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Provider;


interface RankedMenuItemsProviderInterface extends MenuItemsProviderInterface
{

	/**
	 * Get priority rank. Same as order: 1 = first, 100 = bellow.
	 *
	 * @return int
	 */
	function getRank();

}
