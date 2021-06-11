<?php

namespace Realodix\PhpCsFixerConfig\RuleSet;

final class Drupal extends AbstractRuleSet
{
    protected $name = 'Drupal Coding Standards';

    /**
     * drupol/phpcsfixer-configs-drupal
     * - https://github.com/drupol/phpcsfixer-configs-drupal/blob/master/src/Config/Drupal8.php
     * - https://github.com/drupol/phpcsfixer-configs-drupal/blob/master/config/drupal/phpcsfixer.rules.yml
     * - https://github.com/drupol/phpcsfixer-configs-drupal/blob/master/config/drupal8/phpcsfixer.rules.yml
     * - https://github.com/drupol/phpcsfixer-configs-drupal/tree/master/src/Fixer
     *
     * Diff
     * - [D] brace.position_after_anonymous_constructs
     * - [D] no_superfluous_phpdoc_tags.remove_inheritdoc
     * - [D] yoda_style.always_move_variable
     */
    public function getRules(): array
    {
        $rules = [
            'Drupal/blank_line_before_end_of_class' => true,
            'Drupal/control_structure_braces_else'  => true,
            'Drupal/inline_comment_spacer'          => true,

            'array_syntax'                   => true,
            'compact_nullable_typehint'      => true,
            'constant_case'                  => ['case' => 'upper'],
            'declare_equal_normalize'        => ['space' => 'single'],
            'encoding'                       => true,
            'full_opening_tag'               => true,
            'function_declaration'           => true,
            'line_ending'                    => true,
            'lowercase_keywords'             => true,
            'no_mixed_echo_print'            => ['use' => 'print'],
            'no_spaces_after_function_name'  => true,
            'no_spaces_inside_parenthesis'   => true,
            'no_superfluous_phpdoc_tags'     => ['allow_mixed' => true, 'allow_unused_params' => true],
            'single_line_comment_style'      => true,
            'switch_case_semicolon_to_colon' => true,
            'switch_case_space'              => true,
            'visibility_required'            => true,
            'blank_line_before_statement'    => [
                'statements' => [
                    'break', 'case', 'continue', 'declare', 'default', 'do', 'exit',
                    'for', 'foreach', 'goto', 'if', 'include', 'include_once', 'require',
                    'require_once', 'return', 'switch', 'throw', 'try', 'while', 'yield',
                    'yield_from',
                ],
            ],
            'braces' => [
                'allow_single_line_closure'                   => true,
                'position_after_functions_and_oop_constructs' => 'same',
                'position_after_control_structures'           => 'same',
            ],
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    'package',
                    'subpackage',
                    'author',
                    'version',
                ],
            ],
            'global_namespace_import' => [
                'import_classes'   => false,
                'import_constants' => false,
                'import_functions' => false,
            ],
            'no_extra_blank_lines' => [
                'tokens' => [
                    'break', 'case', 'continue', 'default', 'extra', 'parenthesis_brace_block',
                    'return', 'square_brace_block', 'switch', 'throw', 'use', 'use_trait',
                ],
            ],
            'yoda_style' => [
                'equal'            => false,
                'identical'        => false,
                'less_and_greater' => false,
            ],

        ];

        return $rules;
    }
}
