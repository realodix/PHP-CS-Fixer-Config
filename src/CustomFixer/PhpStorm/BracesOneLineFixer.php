<?php

namespace Realodix\CsConfig\CustomFixer\PhpStorm;

use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;

/**
 * PhpStorm/braces_one_line
 * https://github.com/JetBrains/phpstorm-stubs/blob/master/tests/CodeStyle/BracesOneLineFixer.php
 */
final class BracesOneLineFixer implements FixerInterface
{
    public function isCandidate(Tokens $tokens): bool
    {
        return true;
    }

    public function isRisky(): bool
    {
        return false;
    }

    public function fix(\SplFileInfo $file, Tokens $tokens): void
    {
        foreach ($tokens as $index => $token) {
            if (! $token->equals('{')) {
                continue;
            }
            $braceStartIndex = $index;
            $braceEndIndex = $tokens->getNextMeaningfulToken($index);

            if ($tokens[$braceEndIndex]->equals('}')) {
                $beforeBraceIndex = $tokens->getPrevNonWhitespace($braceStartIndex);
                for ($i = $beforeBraceIndex + 1; $i <= $braceEndIndex; $i++) {
                    $tokens->clearAt($i);
                }
                if ($braceEndIndex - $beforeBraceIndex > 2) {
                    $tokens[$beforeBraceIndex + 1] = new Token(' ');
                } else {
                    $tokens->insertAt($beforeBraceIndex + 1, new Token(' '));
                }
                $tokens[$beforeBraceIndex + 2] = new Token('{');
                $tokens[$beforeBraceIndex + 3] = new Token('}');
            }
        }
    }

    public function getName(): string
    {
        return 'PhpStorm/braces_one_line';
    }

    public function getPriority(): int
    {
        return 0;
    }

    public function supports(\SplFileInfo $file): bool
    {
        return true;
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            "Braces of empty function's body should be placed on the same line",
            [
                new CodeSample(
                    <<<'PHP'
<?php
declare(strict_types=1);
function foo() {}
PHP
                ),
            ]
        );
    }
}
