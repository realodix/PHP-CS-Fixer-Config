<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

/**
 * @internal
 */
abstract class AbstractRuleSet implements RuleSetInterface
{
    /** @var string */
    protected $name = '';

    protected $headerComment = [];

    protected $targetPhpVersion = 0;

    final public function __construct(?string $header = null)
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

    final public function name(): string
    {
        return $this->name;
    }

    final public function rules(): array
    {
        return array_merge($this->myRules(), $this->headerComment);
    }

    final public function targetPhpVersion(): int
    {
        return $this->targetPhpVersion;
    }

    abstract public function myRules(): array;
}
