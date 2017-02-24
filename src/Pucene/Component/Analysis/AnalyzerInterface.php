<?php

namespace Pucene\Component\Analysis;

/**
 * TODO add description here
 */
interface AnalyzerInterface
{
    /**
     * Generate token from field-content.
     *
     * @param string $fieldContent
     *
     * @return Token[]
     */
    public function analyze($fieldContent);
}
