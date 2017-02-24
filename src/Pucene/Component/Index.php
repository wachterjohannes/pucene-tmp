<?php

namespace Pucene\Component;

use Pucene\Component\Analysis\AnalyzerRegistry;
use Pucene\Component\Document\Document;
use Pucene\Component\InvertedIndex\InvertedIndex;

/**
 * TODO add description here
 */
class Index
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var AnalyzerRegistry
     */
    private $analyzerRegistry;

    /**
     * @var InvertedIndex
     */
    private $invertedIndex;

    /**
     * @param string $name
     * @param AnalyzerRegistry $analyzerRegistry
     * @param InvertedIndex $invertedIndex
     */
    public function __construct($name, AnalyzerRegistry $analyzerRegistry, InvertedIndex $invertedIndex)
    {
        $this->name = $name;
        $this->analyzerRegistry = $analyzerRegistry;
        $this->invertedIndex = $invertedIndex;
    }

    public function index(Document $document)
    {
        $this->deindex($document->getIdentifier());

        $json = [
            '_id' => $document->getIdentifier(),
            '_type' => 'default', // FIXME
            '_index' => $this->name,
            '_source' => [],
        ];

        foreach ($document->getFields() as $fieldName => $field) {
            $json['_source'][$fieldName] = $field->getContent();

            $this->invertedIndex->save(
                $document,
                $tokens = $this->analyzerRegistry->getAnalyzer($field->getAnalyzerName())->analyze($field->getContent())
            );
        }
    }

    public function deindex($identified)
    {
        // TODO
    }

    public function search($query)
    {
        $analyzer = $this->analyzerRegistry->getAnalyzer('standard');

        $result = [];
        $tokens = $analyzer->analyze($query);
        dump($tokens);

        foreach ($tokens as $token) {
            $documents = $this->invertedIndex->search($token);

            $result = array_merge($result, $documents);
        }

        return $result;
    }
}
