<?php

namespace Realodix\PhpCsFixerConfig;

use drupol\PhpCsFixerConfigsDrupal\Fixer as DrupolFixer;
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
    public static function fromRuleSet(RuleSetInterface $ruleSet, array $overrideRules = [], array $options = [])
    {
        if (\PHP_VERSION_ID < $ruleSet->requiredPHPVersion()) {
            throw new \RuntimeException(
                sprintf(
                    'The "%s" ruleset requires a minimum PHP_VERSION_ID of "%d" but current PHP_VERSION_ID is "%d".',
                    $ruleSet->name(),
                    $ruleSet->requiredPHPVersion(),
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
            'isRiskyAllowed' => $options['isRiskyAllowed'] ?? true,
            'lineEnding'     => $options['lineEnding'] ?? $phpCsFixer->getLineEnding(),
            'usingCache'     => $options['usingCache'] ?? $phpCsFixer->getUsingCache(),
            'rules'          => array_merge($ruleSet->rules(), $overrideRules ?? []),
        ];

        return self::config($ruleSet, $overrideRules, $options);
    }

    /**
     * The main method of creating the Config instance.
     */
    private static function config(RuleSetInterface $ruleSet, array $overrideRules = [], array $options = []): ConfigInterface
    {
        $config = new \PhpCsFixer\Config($ruleSet->name());

        return $config
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
                ->registerCustomFixers([
                    new DrupolFixer\BlankLineBeforeEndOfClass($config->getIndent(), $config->getLineEnding()),
                    new DrupolFixer\ControlStructureCurlyBracketsElseFixer($config->getIndent(), $config->getLineEnding()),
                    new DrupolFixer\InlineCommentSpacerFixer,
                    new DrupolFixer\TryCatchBlock($config->getIndent(), $config->getLineEnding()),
                ])
                ->setRules(array_merge($options['rules'], $overrideRules));
    }

    private static function defaultFinder()
    {
        return Finder::create()
               ->files()
               ->in(__DIR__);
    }
}
