<?php

namespace GO1\Gridster;

interface GridsterManagerInterface {
    /**
     * Register a widget-type to manager.
     *
     * @param string $name
     * @param string $class
     */
    public function registerWidgetType($name, $class);

    /**
     * Unregister widget-type from manager.
     *
     * @param string $name
     */
    public function unregisterWidgetType($name);

    /**
     * Get registered widget-types.
     *
     * @return string[]
     */
    public function getWidgetTypes();

    /**
     * Get widget type object.
     * 
     * @return Widget\WidgetTypeInterface
     */
    public function getWidgetType($name);
}