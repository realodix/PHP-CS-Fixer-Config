<?php

namespace Realodix\CsConfig\RuleSet;

abstract class AbstractRuleSet implements RuleSetInterface
{
    protected $name;

    private $headerComment = [];

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
        return $this->name;
    }

    public function rules(): array
    {
        return array_merge($this->getRules(), $this->headerComment);
    }
}
