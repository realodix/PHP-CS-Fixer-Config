# :exclamation: Abandoned!

This package is abandoned, you should avoid using it. Use [`realodix/relax`](https://github.com/realodix/relax) instead.

# php-cs-fixer-config

![PHPVersion](https://img.shields.io/badge/PHP-^7.4|^8-777BB4.svg?style=flat-square)
![Build Status](https://github.com/realodix/PHP-CS-Fixer-Config/actions/workflows/ci.yml/badge.svg)
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

* [`Realodix`](src/RuleSet/Realodix.php), [`RealodixPlus`](src/RuleSet/RealodixPlus.php)
* [`Laravel`](src/RuleSet/Laravel.php), [`LaravelRisky`](src/RuleSet/LaravelRisky.php)

Create a configuration file `.php-cs-fixer.php` in the root of your project:

```php
<?php

use Realodix\CsConfig\Factory;
use Realodix\CsConfig\RuleSet;

return Factory::fromRuleSet(new RuleSet\Realodix);
```

**Not interested with the built-in rule set?**

Very easy, just use `Blank` rule set, then add your rules.

```php
$yourRules = [
    'your_rule_1' = true,
    'your_rule_2' = true,
];

Factory::fromRuleSet(new RuleSet\Blank, $yourRules);
```

### Configuration with override rules

:bulb: Optionally override rules from a rule set by passing in an array of rules to be merged in:

```diff
-Factory::fromRuleSet(new RuleSet\Realodix);
+Factory::fromRuleSet(new RuleSet\Realodix, [
+    'no_extra_blank_lines' => false,
+]);
```

**Built-in custom fixers**
- `PhpStorm/braces_one_line`
- [kubawerlos/php-cs-fixer-custom-fixers](https://github.com/kubawerlos/php-cs-fixer-custom-fixers)
- [pedrotroller/php-cs-custom-fixer](https://github.com/PedroTroller/PhpCSFixer-Custom-Fixers)
- [Slamdunk/php-cs-fixer-extensions](https://github.com/Slamdunk/php-cs-fixer-extensions)
- [drupol/phpcsfixer-configs-drupal](https://github.com/drupol/phpcsfixer-configs-drupal/tree/master/src/Fixer)
  - `Drupal/blank_line_before_end_of_class`
  - `Drupal/control_structure_braces_else`
  - `Drupal/inline_comment_spacer`
  - `Drupal/new_line_on_multiline_array`
  - `Drupal/try_catch_block`

### Configuration with header

:bulb: Optionally specify a header:

```diff
+$header = <<<EOF
+Copyright (c) 2021 Realodix
+
+For the full copyright and license information, please view
+the LICENSE file that was distributed with this source code.
+
+@see https://github.com/realodix/php-cs-fixer-config
+EOF;

-Factory::fromRuleSet(new RuleSet\Realodix);
+Factory::fromRuleSet(new RuleSet\Realodix($header));
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
