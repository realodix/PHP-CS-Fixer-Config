<?php

declare(strict_types=1);

namespace Realodix\CsConfig\CustomFixer\Symplify;

use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;

abstract class AbstractSymplifyFixer implements FixerInterface
{
    public function getPriority(): int
    {
        return 0;
    }

    public function isRisky(): bool
    {
        return false;
    }

    public function supports(\SplFileInfo $file): bool
    {
        return true;
    }

    /**
     * @return Token[]
     * @param Tokens<Token> $tokens
     */
    protected function reverseTokens(Tokens $tokens): array
    {
        return array_reverse($tokens->toArray(), true);
    }

    protected function getNextMeaningfulToken(Tokens $tokens, int $index): ?Token
    {
        $nextMeaninfulTokenPosition = $tokens->getNextMeaningfulToken($index);
        if ($nextMeaninfulTokenPosition === null) {
            return null;
        }

        return $tokens[$nextMeaninfulTokenPosition];
    }

    protected function getPreviousToken(Tokens $tokens, int $index): ?Token
    {
        $previousIndex = $index - 1;
        if (! isset($tokens[$previousIndex])) {
            return null;
        }

        return $tokens[$previousIndex];
    }
}
