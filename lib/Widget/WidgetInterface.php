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
    public function getId();

    /**
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
     * @todo What is "Placeholders"?
     *
     * @return array
     */
    public function getPlaceholders();
}
