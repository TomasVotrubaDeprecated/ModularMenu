# ModularMenu

[![Build Status](https://img.shields.io/travis/Zenify/ModularMenu.svg?style=flat-square)](https://travis-ci.org/Zenify/ModularMenu)
[![Quality Score](https://img.shields.io/scrutinizer/g/Zenify/ModularMenu.svg?style=flat-square)](https://scrutinizer-ci.com/g/Zenify/ModularMenu)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/Zenify/ModularMenu.svg?style=flat-square)](https://scrutinizer-ci.com/g/Zenify/ModularMenu)
[![Downloads this Month](https://img.shields.io/packagist/dm/zenify/modular-menu.svg?style=flat-square)](https://packagist.org/packages/zenify/modular-menu)
[![Latest stable](https://img.shields.io/packagist/v/zenify/modular-menu.svg?style=flat-square)](https://packagist.org/packages/zenify/modular-menu)


## Install

Via Composer

```sh
$ composer require zenify/modular-menu
```

Register the extension in `config.neon`:

```yaml
extensions:
	- Zenify\ModularMenu\DI\ModularMenuExtension
```


## Usage

### 1. Create providers

Create class that implements `Zenify\ModularMenu\Contract\Provider\MenuItemsProviderInterface` or `Zenify\ModularMenu\Contract\Provider\RankedMenuItemsProviderInterface` to set position of items.

```php
namespace App\Modules\MyModule\Providers\MyModuleMenuItemsProvider;

use Zenify\ModularMenu\Contract\Provider\MenuItemsProviderInterface;


final class MyModuleMenuItemsProvider implements MenuItemsProviderInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getPosition()
	{
		return 'adminMenu';
	}


	/**
	 * {@inheritdoc}
	 */
	public function getItems()
	{
		return new MenuItemCollection([
			new MenuItem('Label', ':Module:Presenter:')
		]);
	}

}
```

The return value of `getItems()` is controlled by validator, that will lead you in case of any error.

Then, register it as service in `config.neon` of your module:

```yaml
services:
	- App\Modules\MyModule\Providers\MyModuleMenuItemsProvider
```

### 2. Use in menu component

Now we only need to get collected menu items and render them.
The render part is up to you, but here we'll use standalone component.


```php
use Nette\Application\UI\Control;
use Zenify\ModularMenu\Contract\MenuManagerInterface;


class MenuControl extends Control
{

	/**
	 * @var MenuManagerInterface
	 */
	private $menuManager;


	public function __construct(MenuManagerInterface $menuManager)
	{
		$this->menuManager = $menuManager;
	}


	public function render()
	{
		$this->template->render(__DIR__ . '/templates/default.latte', [
			'menuItemGroups' => $this->menuManager->getMenuStructure('adminMenu')
		]);
	}

}
```

Our `default.latte` might look like this:

```twig
{foreach $menuItemGroups as $menuItemGroup}
	<ul>
		{foreach $menuItemGroup as $menuItemCollection}
			{foreach $menuItemCollection as $menuItem}
				<li>
					<a n:href="$menuItem->getPath()">{$menuItem->getPath()}</a>
				</li>
			{/foreach}
			{sep}<li class="separator">{/sep}
		{/foreach}
	</ul>
{/foreach}
```


## Testing

```sh
$ phpunit
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
