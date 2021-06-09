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

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

return Factory::fromRuleSet(new RuleSet\Realodix());
```

### Configuration with override rules

:bulb: Optionally override rules from a rule set by passing in an array of rules to be merged in:

```diff
<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

-return Factory::fromRuleSet(new RuleSet\Realodix());
+return Factory::fromRuleSet(new RuleSet\Realodix(), [
+    'no_extra_blank_lines' => false,
+]);
```

### Specifying Options to `PhpCsFixer\Config`

The `Factory` class returns an instance of `PhpCsFixer\Config` and fully supports all of
its properties setup. You can pass an array to the third parameter of
`Factory::fromRuleSet()` containing your desired options.

**Options**

| Key            | Allowed Types                              | Default                      |
| -------------- | :----------------------------------------: | :--------------------------: |
| customFixers   | `FixerInterface[], iterable, \Traversable` | `[]`                         |
| finder         | `iterable, string[], \Traversable`         | `PhpCsFixer\Finder` instance |
| format         | `string`                                   | `txt`                        |
| hideProgress   | `bool`                                     | `false`                      |
| isRiskyAllowed | `bool`                                     | `false`                      |
| usingCache     | `bool`                                     | `true`                       |
| customRules    | `array`                                    | `[]`                         |

```diff
<?php

use Nexus\CsConfig\Factory;
use Nexus\CsConfig\Ruleset\Nexus73;

-return Factory::fromRuleSet(new RuleSet\Realodix());
+return Factory::fromRuleSet(new RuleSet\Realodix(), [], [
+    'usingCache'  => false,
+    'hideProgress => true,
+]);
```

### Configuration with header

:bulb: Optionally specify a header:

```diff
<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

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

This will enable and configure the [`HeaderCommentFixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/3.0/src/Fixer/Comment/HeaderCommentFixer.php), so that file headers will be added to PHP 
files, for example:

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
