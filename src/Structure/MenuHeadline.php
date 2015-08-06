<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Structure;


final class MenuHeadline extends AbstractMenuItem
{

	/**
	 * @param string $label
	 * @param string|NULL $icon
	 */
	public function __construct($label, $icon = NULL)
	{
        $this->setLabel($label);
        if ($icon) {
            $this->setIcon($icon);
        }
	}

}
