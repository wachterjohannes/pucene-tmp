<?php

namespace Pucene\Component\InvertedIndex;

use Pucene\Component\Analysis\Token;
use Pucene\Component\Document\Document;

/**
 * TODO add description here
 */
interface StorageInterface
{
    public function save(Token $token, Document $document);

    public function getDocuments(Token $token);
}
