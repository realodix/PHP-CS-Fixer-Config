<?php

namespace Realodix\CsConfig\Test;

use Realodix\CsConfig\RuleSet\RuleSetInterface;

class DummyRuleSet implements RuleSetInterface
{
    private $rules;

    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    public function name(): string
    {
        return 'foo';
    }

    public function rules(): array
    {
        return $this->rules;
    }
}
