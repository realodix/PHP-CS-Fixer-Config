<?php
namespace Realodix\PhpCsFixerConfig\RuleSet;

use FusionsPim\PhpCsFixer\Factory;
use PhpCsFixerCustomFixers\Fixer;

final class FusionsPim extends AbstractRuleSet implements RuleSetExplicitInterface
{
    protected $name = 'Fusions PIM';

    /**
     * Based on fusionspim/php-cs-fixer-config
     *
     * See https://github.com/fusionspim/php-cs-fixer-config/blob/master/src/Factory.php
     *
     * There are one rules found commented:
     * - NoUselessParenthesisFixer::name()
     */
    public function myRules(): array
    {
        $rules = Factory::DEFAULT_RULES;
        // The extraRules() method cannot be imported because it is a private method
        $extraRules = [
            Fixer\CommentedOutFunctionFixer::name()                 => ['print_r', 'var_dump', 'var_export'],
            Fixer\CommentSurroundedBySpacesFixer::name()            => true,
            Fixer\DataProviderNameFixer::name()                     => ['prefix' => '', 'suffix' => '_data_provider'],
            Fixer\DataProviderReturnTypeFixer::name()               => true,
            Fixer\InternalClassCasingFixer::name()                  => true,
            Fixer\NoCommentedOutCodeFixer::name()                   => true,
            Fixer\NoDoctrineMigrationsGeneratedCommentFixer::name() => true,
            Fixer\NoDuplicatedArrayKeyFixer::name()                 => true,
            Fixer\NoDuplicatedImportsFixer::name()                  => true,
            Fixer\NoPhpStormGeneratedCommentFixer::name()           => true,
            Fixer\NoSuperfluousConcatenationFixer::name()           => true,
            Fixer\NoUselessCommentFixer::name()                     => true,
            Fixer\NoUselessDoctrineRepositoryCommentFixer::name()   => true,
            Fixer\NoUselessStrlenFixer::name()                      => true,
            Fixer\PhpdocNoIncorrectVarAnnotationFixer::name()       => true,
            Fixer\PhpdocSingleLineVarFixer::name()                  => true,
            Fixer\PhpUnitNoUselessReturnFixer::name()               => true,
            Fixer\SingleSpaceAfterStatementFixer::name()            => true,
            Fixer\SingleSpaceBeforeStatementFixer::name()           => true,
        ];

        return array_merge($rules, $extraRules);
    }
}
