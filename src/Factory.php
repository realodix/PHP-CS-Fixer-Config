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
     * Current RuleSetInterface instance.
     *
     * @var \RuleSetInterface
     */
    private $RuleSet;

    /**
     * Array of resolved options.
     *
     * @var array
     */
    private $options = [];

    private function __construct(RuleSetInterface $RuleSet, array $options)
    {
        $this->RuleSet = $RuleSet;
        $this->options = $options;
    }

    /**
     * Prepares the RuleSet and options before the `PhpCsFixer\Config` object is created.
     */
    public static function create(RuleSetInterface $RuleSet, array $overrideRules = [], array $options = []): self
    {
        if (\PHP_VERSION_ID < $RuleSet->getRequiredPHPVersion()) {
            throw new \RuntimeException(sprintf('The "%s" RuleSet requires a minimum PHP_VERSION_ID of "%d" but current PHP_VERSION_ID is "%d".', $RuleSet->getName(), $RuleSet->getRequiredPHPVersion(), \PHP_VERSION_ID));
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
            'rules' => array_merge($RuleSet->getRules(), $overrideRules ?? []),
        ];

        return new self($RuleSet, $options);
    }

    /**
     * The main method of creating the Config instance.
     */
    private function config(array $overrideRules = []): ConfigInterface
    {
        $rules = array_merge($this->options['rules'], $overrideRules);

        return (new Config($this->RuleSet->getName()))
            ->registerCustomFixers($this->options['customFixers'])
            ->setCacheFile($this->options['cacheFile'])
            ->setFinder($this->options['finder'])
            ->setFormat($this->options['format'])
            ->setHideProgress($this->options['hideProgress'])
            ->setIndent($this->options['indent'])
            ->setLineEnding($this->options['lineEnding'])
            ->setPhpExecutable($this->options['phpExecutable'])
            ->setRiskyAllowed($this->options['isRiskyAllowed'])
            ->setUsingCache($this->options['usingCache'])
            ->setRules($rules);
    }

    /**
     * Plain invocation of `Config` with no additional arguments.
     *
     * @return \PhpCsFixer\ConfigInterface
     */
    public function forProjects()
    {
        return $this->config();
    }
}
