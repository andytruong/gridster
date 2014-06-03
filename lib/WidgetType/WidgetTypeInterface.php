<?php

namespace GO1\Gridster\Source;

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
     */
    public function getWidgets();

    /**
     * Get settings form for widget
     */
    # public function getSettingsForm();
}
