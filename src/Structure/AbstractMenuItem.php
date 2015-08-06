<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Structure;

use Assert\Assertion;
use Zenify\ModularMenu\Contract\Structure\MenuItemInterface;


abstract class AbstractMenuItem implements MenuItemInterface
{

	/**
	 * @var string
	 */
	private $label;

	/**
	 * @var string
	 */
	private $icon;


	/**
	 * {@inheritdoc}
	 */
	public function getLabel()
	{
		return $this->label;
	}


	/**
	 * {@inheritdoc}
	 */
	public function getIcon()
	{
		return $this->icon;
	}


	/**
	 * @param string $label
	 */
	protected function setLabel($label)
	{
		Assertion::string($label);
		$this->label = $label;
	}


	/**
	 * @param string $icon
	 */
	protected function setIcon($icon)
	{
		Assertion::string($icon);
		$this->icon = $icon;
	}

}
