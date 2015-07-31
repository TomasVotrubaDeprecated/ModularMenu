<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Contract\Structure;

use IteratorAggregate;
use Zenify\ModularMenu\Structure\MenuHeadline;


interface MenuItemCollectionInterface extends IteratorAggregate
{

	/**
	 * @return MenuItemInterface[]
	 */
	function getIterator();


	/**
	 * @return bool
	 */
	function hasHeadline();


	/**
	 * @return MenuHeadline
	 */
	function getHeadline();

}
