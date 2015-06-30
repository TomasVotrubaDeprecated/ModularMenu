<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Structure;


class AbstractMenuItem
{

	/**
	 * @var string
	 */
	protected $label;

	/**
	 * @var string
	 */
	protected $icon;


	/**
	 * @return string
	 */
	public function getLabel()
	{
		return $this->label;
	}


	/**
	 * @return string
	 */
	public function getIcon()
	{
		return $this->icon;
	}

}
