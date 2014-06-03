<?php

namespace GO1\Gridster\Block;

use GO1\Gridster\Configuration\ConfigurationInterface;
use GO1\Gridster\Source\WidgetTypeInterface;

interface WidgetInterface
{

    /**
     * @return int
     */
    function getId();

    /**
     * @return string
     */
    function getType();

    /**
     * @return string
     */
    function getTitle();

    /**
     * @return WidgetTypeInterface
     */
    function getSource();

    /**
     * Options will specify the options parameter in the json
     * @return array()
     */
    function getOptions();

    /**
     * Placeholders
     * @return array()
     */
    function getPlaceholders();
}
