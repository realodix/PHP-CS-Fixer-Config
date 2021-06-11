<?php

namespace Realodix\PhpCsFixerConfig;

use PhpCsFixer\Config;
use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Finder;
use Realodix\PhpCsFixerConfig\RuleSet\RuleSetInterface;

/**
 * The Factory class is invoked on each project's `.php-cs-fixer.php` to create the
 * specific RuleSet for the project.
 */
final class Factory
{
    /**
     * Prepares the RuleSet and options before the `PhpCsFixer\Config` object is created.
     */
    public static function create(
        RuleSetInterface $ruleSet,
        array $overrideRules = [],
        array $options = []
    ) {
        if (\PHP_VERSION_ID < $ruleSet->getRequiredPHPVersion()) {
            throw new \RuntimeException(
                sprintf(
                    'The "%s" ruleset requires a minimum PHP_VERSION_ID of "%d" but current PHP_VERSION_ID is "%d".',
                    $ruleSet->getName(),
                    $ruleSet->getRequiredPHPVersion(),
                    \PHP_VERSION_ID
                )
            );
        }

        $defaultFinder = Finder::create()
            ->files()
            ->in(__DIR__)
            ->exclude(['build']);

        $options = [
            'cacheFile' => $options['cacheFile'] ?? '.php-cs-fixer.cache',
            'customFixers' => $options['customFixers'] ?? [],
            'finder' => $options['finder'] ?? $defaultFinder,
            'format' => $options['format'] ?? 'txt',
            'hideProgress' => $options['hideProgress'] ?? false,
            'indent' => $options['indent'] ?? '    ',
            'lineEnding' => $options['lineEnding'] ?? "\n",
            'phpExecutable' => $options['phpExecutable'] ?? null,
            'isRiskyAllowed' => $options['isRiskyAllowed'] ?? true,
            'usingCache' => $options['usingCache'] ?? true,
            'rules' => array_merge($ruleSet->getRules(), $overrideRules ?? []),
        ];

        return self::config($ruleSet, $overrideRules, $options);
    }

    /**
     * The main method of creating the Config instance.
     */
    private static function config(
        RuleSetInterface $ruleSet,
        array $overrideRules = [],
        array $options = []
    ): ConfigInterface {
        $rules = array_merge($options['rules'], $overrideRules);

        return (new Config($ruleSet->getName()))
            ->setCacheFile($options['cacheFile'])
            ->setFinder($options['finder'])
            ->setFormat($options['format'])
            ->setHideProgress($options['hideProgress'])
            ->setIndent($options['indent'])
            ->setLineEnding($options['lineEnding'])
            ->setPhpExecutable($options['phpExecutable'])
            ->setRiskyAllowed($options['isRiskyAllowed'])
            ->setUsingCache($options['usingCache'])
            ->registerCustomFixers($options['customFixers'])
            ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers())
            ->registerCustomFixers(new \PedroTroller\CS\Fixer\Fixers())
            ->setRules($rules);
    }
}
