<?php

namespace GO1\Gridster\Widget;

class WidgetTypeBase implements WidgetTypeInterface
{

    protected $name = 'base';
    protected $label = 'Base Widget Type';
    protected $description = 'Most simple widget type.';

    /**
     * Getter for description property.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Getter for label property.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Getter for name property.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Discover all available widgets.
     *
     * @return WidgetInterface[]
     */
    public function getWidgets()
    {
        
    }

}
