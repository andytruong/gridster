<?php

namespace GO1\Gridster\Tests\Fixtures;

use GO1\Gridster\Widget\WidgetInterface;
use GO1\Gridster\GridMaster\GridMasterInterface;
use GO1\Gridster\GridMaster\GridMasterWidgetInterface;
use GO1\Gridster\GridMaster\Helper\RenderInterface;

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
     * @return <WidgetInterface>
     */
    function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * Options will specify the options parameter in the json.
     *
     * @return array
     */
    function getOptions()
    {
        return $this->options;
    }

    function addBlock(WidgetInterface $widget)
    {
        $this->widgets[] = $widget;
    }

    public function addWidget(GridMasterWidgetInterface $gm_widget)
    {
    }

    public function getRender()
    {

    }

    public function getWidget(string $id)
    {

    }

    public function removeWidget(GridMasterWidgetInterface $gm_widget)
    {

    }

    public function removeWidgetById(string $gm_widget_id)
    {

    }

    public function setRender(RenderInterface $render)
    {

    }

    public function getAvailableOptions()
    {

    }

    public function removeAllWidgets()
    {

    }

}
