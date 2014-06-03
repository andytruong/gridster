<?php

namespace GO1\Gridster\Tests\Fixtures;

use GO1\Gridster\Block\WidgetInterface;
use GO1\Gridster\Source\WidgetTypeInterface;

class TwoColumnsWidget implements WidgetInterface
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
     * @return WidgetTypeInterface
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

    function addSource(WidgetTypeInterface $source)
    {
        $this->source = $source;
    }

    function getPlaceholders()
    {
        return array(
            "leftCol" => array(
                array('key' => 'image', 'render' => 'image'),
            ),
            "rightCol" => array(
                "title", array('key' => 'summary', 'render' => 'paragraph', 'class' => 'large')
            )
        );
    }

}
