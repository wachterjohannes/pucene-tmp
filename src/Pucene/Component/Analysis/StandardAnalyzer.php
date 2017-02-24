<?php

namespace Pucene\Component\Analysis;

/**
 * TODO add description here
 */
class StandardAnalyzer implements AnalyzerInterface
{
    /**
     * {@inheritdoc}
     */
    public function analyze($fieldContent)
    {
        dump($fieldContent);

        $tokens = [];

        $start = 0;
        $position = 0;
        $token = '';
        for ($i = 0, $length = strlen($fieldContent); $i < $length; $i++) {
            if ($fieldContent[$i] === ' ') {
                $tokens[] = new Token($token, $start, $i - 1, '<ALPHANUM>', $position);

                $start = $i + 1;
                $position++;
                $token = '';

                continue;
            }

            $token .= $fieldContent[$i];
        }
        $tokens[] = new Token($token, $start, $i - 1, '<ALPHANUM>', $position);
        dump($tokens);

        return $tokens;
    }
}
