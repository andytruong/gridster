<?php

/**
 * There are something to do:
 *
 * 1. Render a widget:
 *      Use wrapper:
 *          $gridmaster
 *              ->getWidgetItem($id) // GridMasterWidgetInterface
 *              ->render()
 *          ;
 *
 *      Details for GridMasterWidgetInterface::render()
 *
 *          if ($widget_type = $this->getWidget()->getType()) { // WidgetTypeInterface
 *              $widget_type->render($options = $this->getOptions());
 *          }
 *
 */

namespace GO1\Gridster;

class GridsterManager implements GridsterManagerInterface
{

    /**
     * Associated array
     *
     *  [string $widget_type => string $widget_type_class]
     *
     * @type string[]
     */
    private $widget_types = array();

    public function registerDefaultWidgetTypes()
    {
        $this->registerWidgetType('base', 'GO1\Gridster\Widget\WidgetTypeBase');
    }

    public function getWidgetTypes()
    {
        return $this->widget_types;
    }

    public function getWidgetType($name)
    {
        if (!isset($this->widget_types[$name])) {
            throw new \InvalidArgumentException(sprintf('Widget type "%s" is not defined.', $name));
        }

        return new $this->widget_types[$name];
    }

    public function registerWidgetType($name, $class_name)
    {
        if (isset($this->widget_types[$name])) {
            throw new \RuntimeException(sprintf('Cannot override frozen widget type "%s".', $name));
        }

        if (!class_exists($class_name)) {
            $msg = sprintf('"%s" is not a valid class name.', $class_name);
            throw new \InvalidArgumentException($msg);
        }

        if (!in_array('GO1\Gridster\Widget\WidgetTypeInterface', class_implements($class_name))) {
            $msg = sprintf('Class "%s" must implements "%s"', $class_name, 'GO1\Gridster\Widget\WidgetTypeInterface');
            throw new \InvalidArgumentException($msg);
        }

        $this->widget_types[$name] = $class_name;
    }

    public function unregisterWidgetType($name)
    {
        unset($this->widget_types[$name]);
    }

}
