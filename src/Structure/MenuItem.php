<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Structure;


class MenuItem
{

	/**
	 * @var string
	 */
	private $label;

	/**
	 * @var string
	 */
	private $path;

	/**
	 * @var string
	 */
	private $icon;


	/**
	 * @param string $label
	 * @param string $path
	 * @param string|NULL $icon
	 */
	public function __construct($label, $path, $icon = NULL)
	{
		$this->label = $label;
		$this->path = $path;
		$this->icon = $icon;
	}


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
	public function getPath()
	{
		return $this->path;
	}


	/**
	 * @return string
	 */
	public function getIcon()
	{
		return $this->icon;
	}

}
