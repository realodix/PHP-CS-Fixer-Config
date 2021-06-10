<?php

namespace Realodix\PhpCsFixerConfig;

use PhpCsFixer\Config;
use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Finder;
use PhpCsFixerCustomFixers\Fixers as CustomFixers;
use Realodix\PhpCsFixerConfig\RuleSet\RuleSetInterface;

final class Factory
{
    /**
     * Creates a configuration based on a rule set.
     *
     * @param \RuleSetInterface $ruleSet
     * @param array             $overrideRules
     * @param array             $options
     *
     * @throws \RuntimeException
     *
     * @return \PhpCsFixer\ConfigInterface
     */
    public static function fromRuleSet(
        RuleSetInterface $ruleSet,
        array $overrideRules = [],
        array $options = []
    ): ConfigInterface {
        if (\PHP_VERSION_ID < $ruleSet->targetPhpVersion()) {
            throw new \RuntimeException(\sprintf(
                'Current PHP version "%s" is less than targeted PHP version "%s".',
                \PHP_VERSION_ID,
                $ruleSet->targetPhpVersion()
            ));
        }

        $finder = Finder::create()
                  ->files()
                  ->in(__DIR__);

        // Resolve Config options
        $options['rules'] = array_merge($ruleSet->rules(), $overrideRules, $options['customRules'] ?? []);
        $options += [
            'customFixers'   => $options['customFixers'] ?? [],
            'finder'         => $options['finder'] ?? $finder,
            'hideProgress'   => $options['hideProgress'] ?? false,
            'isRiskyAllowed' => $options['isRiskyAllowed'] ?? true,
            'lineEnding'     => $options['lineEnding'] ?? "\n",
            'usingCache'     => $options['usingCache'] ?? true,
        ];

        return (new Config($ruleSet->name()))
            ->registerCustomFixers(
                new CustomFixers(),
                $options['customFixers']
            )
            ->setFinder($options['finder'])
            ->setHideProgress($options['hideProgress'])
            ->setLineEnding($options['lineEnding'])
            ->setRiskyAllowed($options['isRiskyAllowed'])
            ->setUsingCache($options['usingCache'])
            ->setRules(\array_merge(
                $options['rules']
            ));
    }
}
