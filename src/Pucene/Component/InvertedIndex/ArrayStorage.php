<?php

namespace Pucene\Component\InvertedIndex;

use Pucene\Component\Analysis\Token;
use Pucene\Component\Document\Document;

/**
 * TODO add description here
 */
class ArrayStorage implements StorageInterface
{
    /**
     * @var Document[][]
     */
    private $invertedIndex = [];

    public function save(Token $token, Document $document)
    {
        if (!array_key_exists($token->getToken(), $this->invertedIndex)) {
            $this->invertedIndex[$token->getToken()] = [];
        }

        $this->invertedIndex[$token->getToken()][] = $document;
    }

    public function getDocuments(Token $token)
    {
        dump($token);

        return $this->invertedIndex[$token->getToken()];
    }
}
