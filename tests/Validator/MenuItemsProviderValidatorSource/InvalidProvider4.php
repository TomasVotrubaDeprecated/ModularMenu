<?php

namespace Zenify\ModularMenu\Tests\Validator\MenuItemsProviderValidatorSource;

use stdClass;
use Zenify\ModularMenu\Contract\Provider\MenuItemsProviderInterface;


class InvalidProvider4 implements MenuItemsProviderInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getPosition()
	{
	}


	/**
	 * {@inheritdoc}
	 */
	public function getItems()
	{
		return new stdClass;
	}

}
