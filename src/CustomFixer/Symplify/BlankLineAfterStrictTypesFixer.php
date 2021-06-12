<?php

declare(strict_types=1);

namespace Realodix\PhpCsFixerConfig\CustomFixer\Symplify;

use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use PhpCsFixer\WhitespacesFixerConfig;
use Symplify\CodingStandard\Fixer\AbstractSymplifyFixer;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * Symplify/blank_line_after_strict_types
 * - https://github.com/symplify/coding-standard/blob/main/src/Fixer/Strict/BlankLineAfterStrictTypesFixer.php
 * - https://github.com/symplify/coding-standard/blob/main/docs/rules_overview.md#blanklineafterstricttypesfixer
 */
final class BlankLineAfterStrictTypesFixer extends AbstractSymplifyFixer
{
    private const ERROR_MESSAGE = 'Strict type declaration has to be followed by empty line';

    /**
     * Generates: "declare(strict_types=1);"
     *
     * @var Token[]
     */
    private $declareStrictTypeTokens = [];

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

    public function getName(): string
    {
        return 'Symplify/blank_line_after_strict_types';
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(self::ERROR_MESSAGE, []);
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

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(self::ERROR_MESSAGE, [
            new CodeSample(
                <<<'CODE_SAMPLE'
declare(strict_types=1);
namespace App;
CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'
declare(strict_types=1);

namespace App;
CODE_SAMPLE
            ),
        ]);
    }
}
