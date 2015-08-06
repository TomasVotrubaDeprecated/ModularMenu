<?php

/**
 * This file is part of Zenify.
 *
 * For the full copyright and license information, please view
 * the file LICENSE that was distributed with this source code.
 */

namespace Zenify\ModularMenu\Contract\Validator;

use Zenify\ModularMenu\Contract\Provider\MenuItemsProviderInterface;


interface MenuItemProviderValidatorInterface
{

	function validate(MenuItemsProviderInterface $provider);

}
