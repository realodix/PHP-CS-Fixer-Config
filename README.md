# php-cs-fixer-config

![PHPVersion](https://img.shields.io/badge/PHP-^7.3|^8-777BB4.svg?style=flat-square)
[![GitHub license](https://img.shields.io/github/license/realodix/PHP-CS-Fixer-Config.svg?style=flat-square)](/LICENSE)

Provides a configuration factory and multiple rule sets for [`friendsofphp/php-cs-fixer`](http://github.com/FriendsOfPHP/PHP-CS-Fixer).

## Installation

You can install the package via composer:

```sh
$ composer require --dev realodix/php-cs-fixer-config
```

## Usage

### Configuration

Pick one of the rule sets:

* [`Realodix`](src/RuleSet/Realodix.php)
* [`RealodixStrict`](src/RuleSet/RealodixStrict.php) - Realodix + some additional rules
* [`Composer`](src/RuleSet/Composer.php)
* [`Joomla`](src/RuleSet/Joomla.php)
* [`Laravel`](src/RuleSet/Laravel.php)
* [`LaravelRisky`](src/RuleSet/LaravelRisky.php) - Laravel + rules that are risky
* [`PhpStorm`](src/RuleSet/PhpStorm.php)
* [`Symfony`](src/RuleSet/Symfony.php)
* [`SymfonyRisky`](src/RuleSet/SymfonyRisky.php) - Symfony + rules that are risky
* [`Typo3`](src/RuleSet/Typo3.php)
* [`Yii`](src/RuleSet/Yii.php)

Create a configuration file `.php-cs-fixer.php` in the root of your project:

```php
<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

$config = Factory::fromRuleSet(new RuleSet\Realodix());
$config->getFinder()->in(__DIR__);

return $config;
```

### Configuration with override rules

:bulb: Optionally override rules from a rule set by passing in an array of rules to be merged in:

```diff
<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

- $config = Factory::fromRuleSet(new RuleSet\Realodix());
+ $config = Factory::fromRuleSet(new RuleSet\Realodix(), [
+     'no_extra_blank_lines' => false,
+ ]);

$config->getFinder()->in(__DIR__);

return $config;
```

### Configuration with header

:bulb: Optionally specify a header:

```diff
<?php

use Realodix\PhpCsFixerConfig\Factory;
use Realodix\PhpCsFixerConfig\RuleSet;

+ $header = <<<EOF
+ Copyright (c) 2021 Realodix
+ 
+ For the full copyright and license information, please view
+ the LICENSE file that was distributed with this source code.
+ 
+ @see https://github.com/realodix/php-cs-fixer-config
+ EOF;

- $config = Factory::fromRuleSet(new RuleSet\Realodix());
+ $config = Factory::fromRuleSet(new RuleSet\Realodix($header));
$config->getFinder()->in(__DIR__);

return $config;
```

This will enable and configure the [`HeaderCommentFixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/3.0/src/Fixer/Comment/HeaderCommentFixer.php), so that
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
