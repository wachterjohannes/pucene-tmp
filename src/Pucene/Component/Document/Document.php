<?php

namespace Pucene\Component\Document;

use Ramsey\Uuid\Uuid;

/**
 * TODO add description here
 */
class Document
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var Field[]
     */
    private $fields;

    /**
     * @param Field[] $fields
     * @param string|null $identifier
     */
    public function __construct(array $fields = [], $identifier = null)
    {
        $this->fields = $fields;
        $this->identifier = $identifier ?: Uuid::uuid4()->toString();
    }

    public function addField($name, Field $field)
    {
        $this->fields[$name] = $field;
    }

    /**
     * Returns identifier.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Returns fields.
     *
     * @return Field[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Returns single field identified by name.
     *
     * @param string $name
     *
     * @return Field
     */
    public function getField($name)
    {
        return $this->fields[$name];
    }
}
