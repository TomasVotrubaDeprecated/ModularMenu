<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Structure;


use Nette\Utils\Strings;


class MenuItem extends AbstractMenuItem
{

	/**
	 * @var string
	 */
	private $path;


	/**
	 * @param string $label
	 * @param string $path
	 * @param string|NULL $icon
	 */
	public function __construct($label, $path, $icon = NULL)
	{
        $this->setLabel($label);
		$this->path = $path;
        if ($icon) {
            $this->setIcon($icon);
        }
	}


	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->path;
	}


	public function getWildcardPath()
	{
		// note: converts :Core:Admin:Homepage:default into :Core:Admin:Homepage:*
		return Strings::replace($this->path, '~[a-z0-9]+$~i', '*');
	}

}
