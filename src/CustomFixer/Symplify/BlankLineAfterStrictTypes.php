<?php

namespace Realodix\CsConfig\CustomFixer\Symplify;

use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use PhpCsFixer\WhitespacesFixerConfig;

/**
 * Symplify - Blank line after strict types
 * - https://github.com/symplify/coding-standard/blob/main/src/Fixer/Strict/BlankLineAfterStrictTypesFixer.php
 * - https://github.com/symplify/coding-standard/blob/main/docs/rules_overview.md#blanklineafterstricttypesfixer
 */
final class BlankLineAfterStrictTypes extends AbstractSymplifyFixer
{
    private $declareStrictTypeTokens = [];

    private $whitespacesFixerConfig;

    public function __construct()
    {
        $this->whitespacesFixerConfig = new WhitespacesFixerConfig;

        $this->declareStrictTypeTokens = [
            new Token([T_DECLARE, 'declare']),
            new Token('('),
            new Token([T_STRING, 'strict_types']),
            new Token('='),
            new Token([T_LNUMBER, '1']),
            new Token(')'),
            new Token(';'),
        ];
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            'Strict type declaration has to be followed by empty line',
            []
        );
    }

    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isAllTokenKindsFound([T_OPEN_TAG, T_WHITESPACE, T_DECLARE, T_STRING, '=', T_LNUMBER, ';']);
    }

    public function fix(\SplFileInfo $file, Tokens $tokens): void
    {
        $sequenceLocation = $tokens->findSequence($this->declareStrictTypeTokens, 1, 15);
        if ($sequenceLocation === null) {
            return;
        }
        $semicolonPosition = (int) array_key_last($sequenceLocation);

        // empty file
        if (! isset($tokens[$semicolonPosition + 2])) {
            return;
        }

        $lineEnding = $this->whitespacesFixerConfig->getLineEnding();

        $tokens->ensureWhitespaceAtIndex($semicolonPosition + 1, 0, $lineEnding.$lineEnding);
    }
}
