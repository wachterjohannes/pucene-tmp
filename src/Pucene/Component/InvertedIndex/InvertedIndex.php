<?php

namespace Pucene\Component\InvertedIndex;

use Pucene\Component\Analysis\Token;
use Pucene\Component\Document\Document;

/**
 * TODO add description here
 */
class InvertedIndex
{
    /**
     * @var StorageInterface
     */
    private $storage;

    /**
     * @param StorageInterface $storage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param Document $document
     * @param Token[] $tokens
     */
    public function save(Document $document, array $tokens)
    {
        foreach ($tokens as $token) {
            $this->storage->save($token, $document);
        }
    }

    /**
     * @param Token $token
     *
     * @return Document[]
     */
    public function search(Token $token)
    {
        dump($token);

        return $this->storage->getDocuments($token);
    }
}
