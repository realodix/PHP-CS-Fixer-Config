<?php

namespace Realodix\PhpCsFixerConfig;

use drupol\PhpCsFixerConfigsDrupal\Fixer as DrupolFixer;
use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Finder;
use Realodix\PhpCsFixerConfig\RuleSet\RuleSetInterface;

final class Factory
{
    /**
     * @param string $name
     */
    private static function phpCsFixer(string $name = 'default')
    {
        return new \PhpCsFixer\Config($name);
    }

    /**
     * Creates a configuration based on a rule set.
     *
     * @param RuleSetInterface $ruleSet
     * @param array            $overrideRules
     * @param array            $options
     *
     * @throws RuntimeException
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

        $options = [
            'cacheFile'      => $options['cacheFile'] ?? self::phpCsFixer()->getCacheFile(),
            'customFixers'   => $options['customFixers'] ?? self::phpCsFixer()->getCustomFixers(),
            'finder'         => $options['finder'] ?? self::defaultFinder(),
            'format'         => $options['format'] ?? self::phpCsFixer()->getFormat(),
            'hideProgress'   => $options['hideProgress'] ?? self::phpCsFixer()->getHideProgress(),
            'indent'         => $options['indent'] ?? self::phpCsFixer()->getIndent(),
            'isRiskyAllowed' => $options['isRiskyAllowed'] ?? true,
            'lineEnding'     => $options['lineEnding'] ?? self::phpCsFixer()->getLineEnding(),
            'usingCache'     => $options['usingCache'] ?? self::phpCsFixer()->getUsingCache(),
            'rules'          => array_merge($ruleSet->rules(), $overrideRules ?? []),
        ];

        return self::config($ruleSet, $overrideRules, $options);
    }

    /**
     * The main method of creating the Config instance.
     *
     * @param RuleSetInterface $ruleSet
     * @param array            $overrideRules
     * @param array            $options
     *
     * @return ConfigInterface
     */
    private static function config(RuleSetInterface $ruleSet, array $overrideRules = [], array $options = []): ConfigInterface
    {
        return self::phpCsFixer($ruleSet->name())
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
                ->registerCustomFixers(self::customFixers())
                ->setRules(array_merge($options['rules'], $overrideRules));
    }

    private static function customFixers(): array
    {
        return [
            new CustomFixer\BracesOneLineFixer(),
            new DrupolFixer\BlankLineBeforeEndOfClass(
                self::phpCsFixer()->getIndent(),
                self::phpCsFixer()->getLineEnding()
            ),
            new DrupolFixer\ControlStructureCurlyBracketsElseFixer(
                self::phpCsFixer()->getIndent(),
                self::phpCsFixer()->getLineEnding()
            ),
            new DrupolFixer\InlineCommentSpacerFixer,
            new \SlamCsFixer\FinalAbstractPublicFixer(),
            new \SlamCsFixer\FinalInternalClassFixer(),
            new \SlamCsFixer\FunctionReferenceSpaceFixer(),
            new \SlamCsFixer\InlineCommentSpacerFixer(),
            new \SlamCsFixer\PhpFileOnlyProxyFixer(new \PhpCsFixer\Fixer\Basic\BracesFixer()),
            new \SlamCsFixer\Utf8Fixer(),
        ];
    }

    private static function defaultFinder()
    {
        return Finder::create()
               ->files()
               ->in(__DIR__);
    }
}
