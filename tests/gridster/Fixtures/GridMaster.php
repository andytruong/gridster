<?php

namespace GO1\Gridster\Tests\Fixtures;

use GO1\Gridster\Block\WidgetInterface;
use GO1\Gridster\GridMaster\GridMasterInterface;

class GridMaster implements GridMasterInterface
{

    protected $id, $title, $widgets, $options;

    public function __construct($id, $title, $options)
    {
        $this->id = $id;
        $this->title = $title;
        $this->options = $options;
        $this->widgets = array();
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
    function getTitle()
    {
        return $this->title;
    }

    /**
     * @return array(BlockInterface)
     */
    function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * Options will specify the options parameter in the json
     * @return array()
     */
    function getOptions()
    {
        return $this->options;
    }

    function addBlock(WidgetInterface $block)
    {
        $this->widgets[] = $block;
    }

    public function addWidget(\GO1\Gridster\GridMaster\GridMasterWidgetInterface $gm_widget)
    {

    }

    public function getRender()
    {

    }

    public function getWidget(string $id)
    {

    }

    public function removeWidget(\GO1\Gridster\GridMaster\GridMasterWidgetInterface $gm_widget)
    {

    }

    public function removeWidgetById(string $gm_widget_id)
    {

    }

    public function setRender(\GO1\Gridster\GridMaster\Helper\RenderInterface $render)
    {

    }

}
