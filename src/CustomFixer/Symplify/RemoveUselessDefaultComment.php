<?php

namespace Realodix\CsConfig\CustomFixer\Symplify;

use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Tokens;
use Symplify\CodingStandard\DocBlock\UselessDocBlockCleaner;

/**
 * Symplify - Remove useless default comment
 * - https://github.com/symplify/coding-standard/blob/main/src/Fixer/Commenting/RemoveUselessDefaultCommentFixer.php
 * - https://github.com/symplify/coding-standard/blob/main/docs/rules_overview.md#removeuselessdefaultcommentfixer
 */
final class RemoveUselessDefaultComment extends AbstractSymplifyFixer
{
    private $uselessDocBlockCleaner;

    public function __construct()
    {
        $this->uselessDocBlockCleaner = new UselessDocBlockCleaner;
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
