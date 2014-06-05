<?php

namespace GO1\Gridster\GridMaster;

use GO1\Gridster\Widget\WidgetInterface;

class GridMasterWidgetBase implements GridMasterWidgetInterface
{

    /**
     * Grid-master object.
     *
     * @var GridMasterInterface
     */
    protected $grid_master;

    /**
     * Unique ID of widget in grid-master.
     *
     * @var string
     */
    protected $id;

    /**
     * Admin displaying label.
     *
     * @var string
     */
    protected $label = '';

    /**
     * Displaying title which is visible for end user.
     *
     * @var string
     */
    protected $title = '';

    /**
     * Wiget type
     *
     * @var string
     */
    protected $widget_type;

    /**
     * Options for a widget inside a grid-master. Available options:
     *
     *  - position: [ 'sizeX': int, 'sizeY': int, 'col': int, 'row': int ]
     *  - attributes: [ id: 'ID for wrapper DOM', 'class': 'classes-for-wrapper-DOM' ]
     *
     * @var array
     */
    protected $options = array();

    /**
     * List of CSS files attached to widget.
     *
     * @var string[]
     */
    protected $css = array();

    /**
     * List of JS files attached to widget.
     *
     * @var string[]
     */
    protected $js = array();

    /**
     * Setter for grid_master property.
     *
     * @param \GO1\Gridster\GridMaster\GridMasterInterface $grid_master
     */
    public function setGridMaster(GridMasterInterface $grid_master)
    {
        $this->grid_master = $grid_master;
    }

    /**
     * @inheritedoc
     * @return string
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @inheritedoc
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritedoc
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @inheritedoc
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @inheritedoc
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @inheritedoc
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @inheritedoc
     * @param string $widget
     */
    public function setWidgetType($widget)
    {
        $this->widget_type = $widget;
    }

    /**
     * @inheritedoc
     * @return \GO1\Gridster\Widget\WidgetTypeInterface
     */
    public function getWidgetType()
    {
        if (is_null($this->widget_type)) {
            throw new \RuntimeException('Missing property: widget_type.');
        }

        if (is_null($this->grid_master)) {
            throw new \RuntimeException('Missing property: grid_master');
        }

        return $this->grid_master
                ->getGridsterManager()
                ->getWidgetType($this->widget_type);
    }

    /**
     * @inheritedoc
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * @inheritedoc
     * @param string $key
     * @param mixed $value
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
    }

    /**
     * @inheritedoc
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @inheritedoc
     * @param string[] $paths
     */
    public function setCss(array $paths)
    {
        $this->css = $paths;
    }

    /**
     * @inheritedoc
     * @return string[]
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @inheritedoc
     * @param string[] $paths
     */
    public function setJs(array $paths)
    {
        $this->js = $paths;
    }

    /**
     * @inheritedoc
     * @return string[]
     */
    public function getJs()
    {
        return $this->js;
    }

    public function getContent()
    {
        $options = $this->getOptions();
        return $this->getWidgetType()->render($options);
    }

}
