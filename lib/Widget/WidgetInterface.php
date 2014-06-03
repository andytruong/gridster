<?php

namespace GO1\Gridster\Block;

use GO1\Gridster\Source\WidgetTypeInterface;

interface WidgetInterface
{

    /**
     * Getter for ID property (should be UUID)
     *
     * @return string
     */
    function getId();

    /**
     * @return WidgetTypeInterface
     */
    function getType();

    /**
     * Generate admin label for widget.
     *
     * @return string
     */
    function getAdminLabel();

    /**
     * Options will specify the options parameter in the json.
     *
     * @return array
     */
    function getOptions();

    /**
     * @todo What is "Placeholders"?
     *
     * @return array
     */
    function getPlaceholders();
}
