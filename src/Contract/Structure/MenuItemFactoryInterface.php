<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Contract\Structure;

use Zenify\ModularMenu\Structure\MenuItem;


interface MenuItemFactoryInterface
{

	/**
	 * @param string $label
	 * @param string $path
	 * @param string|NULL $icon
	 * @return MenuItem
	 */
	function create($label, $path, $icon = NULL);

}
