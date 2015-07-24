<?php

namespace Zenify\ModularMenu\Tests\Structure;

use PHPUnit_Framework_TestCase;
use Zenify\ModularMenu\Structure\MenuHeadline;


class MenuHeadlineTest extends PHPUnit_Framework_TestCase
{

	public function testGetters()
	{
		$menuHeadline = new MenuHeadline('Label', 'fa fa-user');

		$this->assertSame('Label', $menuHeadline->getLabel());
		$this->assertSame('fa fa-user', $menuHeadline->getIcon());
	}

}
