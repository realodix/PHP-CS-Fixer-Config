<?php

namespace Realodix\PhpCsFixerConfig\CustomFixer\Symplify;

use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use Symplify\CodingStandard\DocBlock\UselessDocBlockCleaner;

/**
 * Symplify/remove_useless_default_comment
 * - https://github.com/symplify/coding-standard/blob/main/src/Fixer/Commenting/RemoveUselessDefaultCommentFixer.php
 * - https://github.com/symplify/coding-standard/blob/main/docs/rules_overview.md#removeuselessdefaultcommentfixer
 */
final class RemoveUselessDefaultCommentFixer extends AbstractSymplifyFixer
{
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
        return new FixerDefinition(
            'Remove useless PHPStorm-generated @todo comments, redundant "Class XY" or "gets service" comments etc.',
            []
        );
    }

    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isAnyTokenKindsFound([T_DOC_COMMENT, T_COMMENT]);
    }

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
}
