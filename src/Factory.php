<?php

namespace Realodix\PhpCsFixerConfig;

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
    public static function create(RuleSetInterface $ruleSet, array $overrideRules = [], array $options = [])
    {
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

        $phpCsFixer = new \PhpCsFixer\Config();

        $options = [
            'cacheFile'      => $options['cacheFile'] ?? $phpCsFixer->getCacheFile(),
            'customFixers'   => $options['customFixers'] ?? $phpCsFixer->getCustomFixers(),
            'finder'         => $options['finder'] ?? self::defaultFinder(),
            'format'         => $options['format'] ?? $phpCsFixer->getFormat(),
            'hideProgress'   => $options['hideProgress'] ?? $phpCsFixer->getHideProgress(),
            'indent'         => $options['indent'] ?? $phpCsFixer->getIndent(),
            'lineEnding'     => $options['lineEnding'] ?? $phpCsFixer->getLineEnding(),
            'isRiskyAllowed' => $options['isRiskyAllowed'] ?? true,
            'usingCache'     => $options['usingCache'] ?? $phpCsFixer->getUsingCache(),
            'rules'          => array_merge($ruleSet->getRules(), $overrideRules ?? []),
        ];

        return self::config($ruleSet, $overrideRules, $options);
    }

    /**
     * The main method of creating the Config instance.
     */
    private static function config(RuleSetInterface $ruleSet, array $overrideRules = [], array $options = []): ConfigInterface
    {
        return (new \PhpCsFixer\Config($ruleSet->getName()))
               ->setCacheFile($options['cacheFile'])
               ->setFinder($options['finder'])
               ->setFormat($options['format'])
               ->setHideProgress($options['hideProgress'])
               ->setIndent($options['indent'])
               ->setLineEnding($options['lineEnding'])
               ->setRiskyAllowed($options['isRiskyAllowed'])
               ->setUsingCache($options['usingCache'])
               ->registerCustomFixers($options['customFixers'])
               ->registerCustomFixers(new \PhpCsFixerCustomFixers\Fixers())
               ->registerCustomFixers(new \PedroTroller\CS\Fixer\Fixers())
               ->setRules(array_merge($options['rules'], $overrideRules));
    }

    private static function defaultFinder()
    {
        return Finder::create()
               ->files()
               ->in(__DIR__);
    }
}
