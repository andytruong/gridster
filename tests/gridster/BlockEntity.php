<?php

namespace GO1\Gridster\Tests;

use GO1\Gridster\Block\BlockInterface;
use GO1\Gridster\Source\SourceInterface;

class BlockEntity implements BlockInterface
{

    protected $id, $type, $title, $source, $options;

    function __construct($id, $type, $title, $source, $options)
    {
        $this->id = $id;
        $this->type = $type;
        $this->title = $title;
        $this->source = $source;
        $this->options = $options;
    }

    /**
     * @return int
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    function getTitle()
    {
        return $this->title;
    }

    /**
     * @return SourceInterface
     */
    function getSource()
    {
        return $this->source;
    }

    /**
     * Options will specify the options parameter in the json
     * @return array()
     */
    function getOptions()
    {
        return $this->options;
    }

    function addSource(SourceInterface $source)
    {
        $this->source = $source;
    }

    function getPlaceholders()
    {
        return array(
            'default' => array(
                'title', array('key' => 'summary', 'render' => 'paragraph', 'class' => 'large'), array('key' => 'image', 'render' => 'image')
            )
        );
    }

}
