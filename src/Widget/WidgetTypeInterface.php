<?php

/**
 * Contains GO1\Gridster\Widget\WidgetTypeInterface
 */

namespace GO1\Gridster\Widget;

/**
 * Defines a common interface for widget type.
 */
interface WidgetTypeInterface
{

    /**
     * Get machine name of widget type.
     *
     * @return string
     */
    public function getName();

    /**
     * Return human readable name.
     *
     * @return string
     */
    public function getLabel();

    /**
     * Description for widget type.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get all widgets.
     *
     * @return WidgetTypeInterface[]
     */
    public function getWidgets();

    /**
     * Get settings form for widget
     */
    # public function getSettingsForm();
}
