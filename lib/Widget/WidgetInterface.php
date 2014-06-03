<?php

/**
 * @file
 * Contains GO1\Gridster\Widget\WidgetInterface
 */

namespace GO1\Gridster\Widget;

use GO1\Gridster\Widget\WidgetTypeInterface;

/**
 * Defines a common interface for gridster widgets.
 */
interface WidgetInterface
{

    /**
     * Getter for ID property (should be UUID)
     *
     * @return string
     */
    public function getId();

    /**
     * Getter for widget_type property.
     *
     * @return WidgetTypeInterface
     */
    public function getType();

    /**
     * Generate admin label for widget.
     *
     * @return string
     */
    public function getAdminLabel();

    /**
     * Options will specify the options parameter in the json.
     *
     * @return array
     */
    public function getOptions();

    /**
     * What is "Placeholders"? Is this needed?
     *
     * @return array
     */
    public function getPlaceholders();
}
