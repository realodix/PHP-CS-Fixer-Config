<?php

namespace Realodix\CsConfig\RuleSet;

final class CodeIgniterRisky extends AbstractRuleSet
{
    protected $name = 'CodeIgniter4 Coding Standards (risky)';

    /**
     * Based on codeigniter4/CodeIgniter4
     * - https://github.com/codeigniter4/CodeIgniter4/blob/3d0a4a7/utils/PhpCsFixer/CodeIgniter4.php (develop)
     */
    public function getRules(): array
    {
        $baseRules = (new CodeIgniter())->getRules();

        $rules = [
            'array_push'           => true,
            'function_to_constant' => true,
            'no_alias_functions'   => ['sets' => ['@all']],
            'static_lambda'        => true,
        ];

        return array_merge($baseRules, $rules);
    }
}
