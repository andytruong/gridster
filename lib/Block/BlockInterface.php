<?php

namespace GO1\Gridster\Block;

use GO1\Gridster\Configuration\ConfigurationInterface;
use GO1\Gridster\Source\SourceInterface;

interface BlockInterface
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
     * @return SourceInterface
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
