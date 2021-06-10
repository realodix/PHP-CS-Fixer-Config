<?php

namespace Realodix\PhpCsFixerConfig\Ruleset;

abstract class AbstractRuleset implements RulesetInterface
{
    protected $name;

    protected $headerComment = [];

    protected $requiredPHPVersion = 0;

    protected $autoActivateIsRiskyAllowed = false;

    final public function __construct(?string $header = null)
    {
        if (null === $header) {
            return;
        }

        $this->headerComment['header_comment'] = [
            'comment_type' => 'PHPDoc',
            'header' => \trim($header),
            'location' => 'after_declare_strict',
            'separate' => 'both',
        ];
    }

    final public function getName(): string
    {
        $class = strrchr(self::class, '\\') ?: self::class;

        return $this->name ?? trim($class, '\\');
    }

    final public function getRules(): array
    {
        return array_merge($this->rules(), $this->headerComment);
    }

    final public function getRequiredPHPVersion(): int
    {
        return $this->requiredPHPVersion;
    }

    final public function willAutoActivateIsRiskyAllowed(): bool
    {
        return $this->autoActivateIsRiskyAllowed;
    }

    abstract public function rules(): array;
}
