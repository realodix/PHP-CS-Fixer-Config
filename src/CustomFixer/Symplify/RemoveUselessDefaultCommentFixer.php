<?php

namespace Realodix\PhpCsFixerConfig\CustomFixer\Symplify;

use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use Symplify\CodingStandard\DocBlock\UselessDocBlockCleaner;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * Symplify/remove_useless_default_comment
 * - https://github.com/symplify/coding-standard/blob/main/src/Fixer/Commenting/RemoveUselessDefaultCommentFixer.php
 * - https://github.com/symplify/coding-standard/blob/main/docs/rules_overview.md#removeuselessdefaultcommentfixer
 */
final class RemoveUselessDefaultCommentFixer extends AbstractSymplifyFixer
{
    private const ERROR_MESSAGE = 'Remove useless PHPStorm-generated @todo comments, redundant "Class XY" or "gets service" comments etc.';

    public function __construct()
    {
        $this->uselessDocBlockCleaner = new UselessDocBlockCleaner;
    }

    public function getName(): string
    {
        return 'Symplify/remove_useless_default_comment';
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(self::ERROR_MESSAGE, []);
    }

    /**
     * @param Tokens<Token> $tokens
     */
    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isAnyTokenKindsFound([T_DOC_COMMENT, T_COMMENT]);
    }

    /**
     * @param Tokens<Token> $tokens
     */
    public function fix(\SplFileInfo $file, Tokens $tokens): void
    {
        $reversedTokens = $this->reverseTokens($tokens);
        foreach ($reversedTokens as $index => $token) {
            if (! $token->isGivenKind([T_DOC_COMMENT, T_COMMENT])) {
                continue;
            }

            $cleanedDocContent = $this->uselessDocBlockCleaner->clearDocTokenContent(
                $reversedTokens,
                $index,
                $token->getContent()
            );
            if ($cleanedDocContent !== '') {
                continue;
            }

            // remove token
            $tokens->clearAt($index);
        }
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(self::ERROR_MESSAGE, [
            new CodeSample(
                <<<'CODE_SAMPLE'
/**
 * class SomeClass
 */
class SomeClass
{
    /**
     * SomeClass Constructor.
     */
    public function __construct()
    {
        // TODO: Change the autogenerated stub
        // TODO: Implement whatever() method.
    }
}
CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'
class SomeClass
{
    public function __construct()
    {
    }
}
CODE_SAMPLE
            ),
        ]);
    }
}
