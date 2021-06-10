<?php

namespace Realodix\PhpCsFixerConfig;

use PhpCsFixer\Config;
use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Finder;
use Realodix\PhpCsFixerConfig\Ruleset\RulesetInterface;

/**
 * The Factory class is invoked on each project's `.php_cs` to create
 * the specific ruleset for the project.
 *
 * @internal
 */
final class Factory
{
    /**
     * Current RulesetInterface instance.
     *
     * @var \Realodix\PhpCsFixerConfig\Ruleset\RulesetInterface
     */
    private $ruleset;

    /**
     * Array of resolved options.
     *
     * @var array<string, mixed>
     */
    private $options = [];

    /**
     * Constructor.
     */
    private function __construct(RulesetInterface $ruleset, array $options)
    {
        $this->ruleset = $ruleset;
        $this->options = $options;
    }

    /**
     * Prepares the ruleset and options before the `PhpCsFixer\Config` object
     * is created.
     */
    public static function create(RulesetInterface $ruleset, array $overrideRules = [], array $options = []): self
    {
        if (\PHP_VERSION_ID < $ruleset->getRequiredPHPVersion()) {
            throw new \RuntimeException(sprintf('The "%s" ruleset requires a minimum PHP_VERSION_ID of "%d" but current PHP_VERSION_ID is "%d".', $ruleset->getName(), $ruleset->getRequiredPHPVersion(), \PHP_VERSION_ID));
        }

        // Meant to be used in vendor/ to get to the root directory
        $dir = \dirname(__DIR__, 4);
        $dir = realpath($dir) ?: $dir;

        $defaultFinder = Finder::create()
            ->files()
            ->in([$dir])
            ->exclude(['build'])
        ;

        // Resolve Config options
        $options['cacheFile'] = $options['cacheFile'] ?? '.php-cs-fixer.cache';
        $options['customFixers'] = $options['customFixers'] ?? [];
        $options['finder'] = $options['finder'] ?? $defaultFinder;
        $options['format'] = $options['format'] ?? 'txt';
        $options['hideProgress'] = $options['hideProgress'] ?? false;
        $options['indent'] = $options['indent'] ?? '    ';
        $options['lineEnding'] = $options['lineEnding'] ?? "\n";
        $options['phpExecutable'] = $options['phpExecutable'] ?? null;
        $options['isRiskyAllowed'] = $options['isRiskyAllowed'] ?? true;
        $options['usingCache'] = $options['usingCache'] ?? true;
        $options['rules'] = array_merge($ruleset->getRules(), $overrideRules, $options['customRules'] ?? []);

        return new self($ruleset, $options);
    }

    /**
     * The main method of creating the Config instance.
     *
     * @internal
     */
    private function config(array $overrideRules = []): ConfigInterface
    {
        $rules = array_merge($this->options['rules'], $overrideRules);

        return (new Config($this->ruleset->getName()))
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
            ->setRules($rules)
        ;
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
