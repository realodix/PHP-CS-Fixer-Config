<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

abstract class AbstractRuleSet implements RuleSetInterface
{
    protected $name;

    protected $headerComment = [];

    protected $requiredPHPVersion = 0;

    abstract public function ruleSet(): array;

    public function __construct(?string $header = null)
    {
        if (null === $header) {
            return;
        }

        $this->headerComment['header_comment'] = [
            'comment_type' => 'PHPDoc',
            'header'       => \trim($header),
            'location'     => 'after_declare_strict',
            'separate'     => 'both',
        ];
    }

    public function getName(): string
    {
        $class = strrchr(self::class, '\\') ?: self::class;

        return $this->name ?? trim($class, '\\');
    }

    public function getRules(): array
    {
        return array_merge($this->ruleSet(), $this->headerComment);
    }

    public function getRequiredPHPVersion(): int
    {
        return $this->requiredPHPVersion;
    }
}
