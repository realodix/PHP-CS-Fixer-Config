# php-cs-fixer-config

![PHPVersion](https://img.shields.io/badge/PHP-^7.3|^8-777BB4.svg?style=flat-square)
[![GitHub license](https://img.shields.io/github/license/realodix/PHP-CS-Fixer-Config.svg?style=flat-square)](/LICENSE)

Provides a configuration factory and multiple rule sets for [`friendsofphp/php-cs-fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer).

## Installation

You can install the package via composer:

```sh
composer require --dev realodix/php-cs-fixer-config
```

## Usage

### Configuration

Pick one of the rule sets:

* [`Realodix`](src/RuleSet/Realodix.php) or [`RealodixStrict`](src/RuleSet/RealodixStrict.php)
* [`Laravel`](src/RuleSet/Laravel.php) or [`LaravelRisky`](src/RuleSet/LaravelRisky.php)
* [`Symfony`](src/RuleSet/Symfony.php) or [`SymfonyRisky`](src/RuleSet/SymfonyRisky.php)
* [`CodeIgniter`](src/RuleSet/CodeIgniter.php)
* [`Composer`](src/RuleSet/Composer.php)
* [`Drupal`](src/RuleSet/Drupal.php)
* [`Joomla`](src/RuleSet/Joomla.php)
* [`PhpStorm`](src/RuleSet/PhpStorm.php)
* [`PHPUnit`](src/RuleSet/PHPUnit.php), [`PHPUnitRisky`](src/RuleSet/PHPUnitRisky.php)
* [`Yii`](src/RuleSet/Yii.php), [`YiiRisky`](src/RuleSet/YiiRisky.php)

Create a configuration file `.php-cs-fixer.php` in the root of your project:

```php
<?php

use Realodix\CsConfig\Factory;
use Realodix\CsConfig\RuleSet;

return Factory::fromRuleSet(new RuleSet\Realodix());
```

### Configuration with override rules

:bulb: Optionally override rules from a rule set by passing in an array of rules to be merged in:

```diff
 <?php

 use Realodix\CsConfig\Factory;
 use Realodix\CsConfig\RuleSet;

-return Factory::fromRuleSet(new RuleSet\Realodix());
+return Factory::fromRuleSet(new RuleSet\Realodix(), [
+    'no_extra_blank_lines' => false,
+]);
```

**Built-in custom fixers**
- [kubawerlos/php-cs-fixer-custom-fixers](https://github.com/kubawerlos/php-cs-fixer-custom-fixers)
- [PedroTroller/PhpCSFixer-Custom-Fixers](https://github.com/PedroTroller/PhpCSFixer-Custom-Fixers)
- [Slamdunk/php-cs-fixer-extensions](https://github.com/Slamdunk/php-cs-fixer-extensions)
  - `Slam/final_abstract_public`
  - `Slam/final_internal_class`
  - `Slam/function_reference_space`
  - `Slam/inline_comment_spacer`
  - `Slam/php_only_braces`
  - `Slam/utf8`
- [drupol/phpcsfixer-configs-drupal](https://github.com/drupol/phpcsfixer-configs-drupal/tree/master/src/Fixer)
  - `Drupal/blank_line_before_end_of_class`
  - `Drupal/control_structure_braces_else`
  - `Drupal/inline_comment_spacer`
- `PhpStorm/braces_one_line`
- [symplify/coding-standard](https://github.com/symplify/coding-standard/blob/main/docs/rules_overview.md)
  - `Symplify/blank_line_after_strict_types`
  - `Symplify/param_return_and_var_tag_malforms`
  - `Symplify/remove_useless_default_comment`

### Specifying Options to `PhpCsFixer\Config`

The `Factory` class returns an instance of `PhpCsFixer\Config` and fully supports all of
its properties setup. You can pass an array to the third parameter of
`Factory::fromRuleSet()` containing your desired options.

**Options**

| Key              | Allowed Types                | Default                      |
| ---------------- | :--------------------------: | :--------------------------: |
| `finder`         | `null|iterable`              | `PhpCsFixer\Finder` instance |
| `isRiskyAllowed` | `bool`                       | `True`                       |
| `cacheFile`      | `string`                     | PHP CS Fixer default value   |
| `customFixers`   | [`FixerInterface[]`][1]      | PHP CS Fixer default value   |
| `format`         | `string`                     | PHP CS Fixer default value   |
| `hideProgress`   | `bool`                       | PHP CS Fixer default value   |
| `indent`         | `string`                     | PHP CS Fixer default value   |
| `lineEnding`     | `string`                     | PHP CS Fixer default value   |
| `usingCache`     | `bool`                       | PHP CS Fixer default value   |


```diff
 <?php

+use PhpCsFixer\Finder;
 use Realodix\CsConfig\Factory;
 use Realodix\CsConfig\RuleSet;

+$finder = Finder::create()
+              ->files()
+              ->in(__DIR__);

-return Factory::fromRuleSet(new RuleSet\Realodix());
+return Factory::fromRuleSet(new RuleSet\Realodix(), [], [
+    'usingCache'   => false,
+    'hideProgress' => true,
+    'finder'       => $finder,
+]);
```

### Configuration with header

:bulb: Optionally specify a header:

```diff
<?php

use Realodix\CsConfig\Factory;
use Realodix\CsConfig\RuleSet;

+$header = <<<EOF
+Copyright (c) 2021 Realodix
+ 
+For the full copyright and license information, please view
+the LICENSE file that was distributed with this source code.
+ 
+@see https://github.com/realodix/php-cs-fixer-config
+EOF;

-return Factory::fromRuleSet(new RuleSet\Realodix());
+return Factory::fromRuleSet(new RuleSet\Realodix($header));
```

This will enable and configure the [`HeaderCommentFixer`][headerCommentFixer], so that
file headers will be added to PHP files, for example:

```php
<?php

/**
 * Copyright (c) 2021 Realodix
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/realodix/php-cs-fixer-config
 */
```

## License

This package is licensed using the [MIT License](/LICENSE).

## Credits

This project is inspired by and also replaces [ergebnis/php-cs-fixer-config](https://github.com/ergebnis/php-cs-fixer-config).


[1]: https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/3.0/src/Fixer/FixerInterface.php
[headerCommentFixer]: https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/3.0/src/Fixer/Comment/HeaderCommentFixer.php
