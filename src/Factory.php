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

        $config = new Config($ruleSet->name());
        $finder = Finder::create()
                  ->files()
                  ->in(__DIR__);

        $options += [
            'customFixers'   => $options['customFixers'] ?? $config->getCustomFixers(),
            'finder'         => $options['finder'] ?? $finder,
            'hideProgress'   => $options['hideProgress'] ?? $config->getHideProgress(),
            'isRiskyAllowed' => $options['isRiskyAllowed'] ?? true,
            'lineEnding'     => $options['lineEnding'] ?? $config->getLineEnding(),
            'usingCache'     => $options['usingCache'] ?? $config->getUsingCache(),
            'rules'          => array_merge($ruleSet->rules(), $overrideRules),
        ];

        return $config
            ->registerCustomFixers(
                new CustomFixers(),
                $options['customFixers']
            )
            ->setFinder($options['finder'])
            ->setHideProgress($options['hideProgress'])
            ->setLineEnding($options['lineEnding'])
            ->setRiskyAllowed($options['isRiskyAllowed'])
            ->setUsingCache($options['usingCache'])
            ->setRules(\array_merge($options['rules']));
    }
}
