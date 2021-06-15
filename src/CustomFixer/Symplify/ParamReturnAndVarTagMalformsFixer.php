<?php

namespace Realodix\CsConfig\CustomFixer\Symplify;

use Nette\Utils\Strings;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Tokens;
use SplFileInfo;

/**
 * Symplify - Param return and var tag malforms
 * - https://github.com/symplify/coding-standard/blob/main/src/Fixer/Commenting/ParamReturnAndVarTagMalformsFixer.php
 * - https://github.com/symplify/coding-standard/blob/main/docs/rules_overview.md#paramreturnandvartagmalformsfixer
 */
final class ParamReturnAndVarTagMalformsFixer extends AbstractSymplifyFixer
{
    /**
     * @var string
     *
     * @see https://regex101.com/r/8iqNuR/1
     */
    private const TYPE_ANNOTATION_REGEX = '#@(param|return|var)#';

    private $malformWorkers = [];

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            'Fixes @param, @return, @var and inline @var annotations broken formats',
            []
        );
    }

    public function isCandidate(Tokens $tokens): bool
    {
        if (! $tokens->isAnyTokenKindsFound([T_DOC_COMMENT, T_COMMENT])) {
            return false;
        }

        return $tokens->isAnyTokenKindsFound([T_FUNCTION, T_VARIABLE]);
    }

    public function fix(SplFileInfo $file, Tokens $tokens): void
    {
        $reversedTokens = $this->reverseTokens($tokens);
        foreach ($reversedTokens as $index => $token) {
            if (! $token->isGivenKind([T_DOC_COMMENT, T_COMMENT])) {
                continue;
            }

            $docContent = $token->getContent();
            if (! Strings::match($docContent, self::TYPE_ANNOTATION_REGEX)) {
                continue;
            }

            $originalDocContent = $docContent;
            foreach ($this->malformWorkers as $malformWorker) {
                $docContent = $malformWorker->work($docContent, $tokens, $index);
            }

            if ($docContent === $originalDocContent) {
                continue;
            }

            $tokens[$index] = new Token([T_DOC_COMMENT, $docContent]);
        }
    }

    /**
     * Must run before
     *
     * @see \PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer::getPriority()
     */
    public function getPriority(): int
    {
        return -37;
    }
}
