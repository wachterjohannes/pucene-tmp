<?php

namespace Pucene\Component\Analysis;

/**
 * TODO add description here
 */
class AnalyzerRegistry
{
    /**
     * @var AnalyzerInterface[]
     */
    private $analyzers;

    /**
     * @param AnalyzerInterface[] $analyzers
     */
    public function __construct(array $analyzers)
    {
        $this->analyzers = $analyzers;
    }

    public function getAnalyzer($name)
    {
        return $this->analyzers[$name];
    }
}
