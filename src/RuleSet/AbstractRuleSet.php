<?php

namespace Realodix\CsConfig\RuleSet;

abstract class AbstractRuleSet implements RuleSetInterface
{
    protected $name;

    protected $headerComment = [];

    protected $requiredPHPVersion = 0;

    abstract public function getRules(): array;

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

    public function name(): string
    {
        $class = strrchr(self::class, '\\') ?: self::class;

        return $this->name ?? trim($class, '\\');
    }

    public function rules(): array
    {
        return array_merge($this->getRules(), $this->headerComment);
    }

    public function requiredPHPVersion(): int
    {
        return $this->requiredPHPVersion;
    }
}
