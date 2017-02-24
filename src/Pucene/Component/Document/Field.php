<?php

namespace Pucene\Component\Document;

/**
 * TODO add description here
 */
class Field
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $analyzerName = 'standard';

    public function __construct($content = null, $type = FieldTypes::STRING)
    {
        $this->content = $content;
        $this->type = $type;
    }

    /**
     * Returns content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Returns type.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns analyzerName.
     *
     * @return string
     */
    public function getAnalyzerName()
    {
        return $this->analyzerName;
    }
}
