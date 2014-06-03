<?php

namespace GO1\Gridster\Grid;

use GO1\Gridster\Block\WidgetInterface;

interface GridMasterInterface
{

    /**
     * @return int
     */
    function getId();

    /**
     * @return string
     */
    function getTitle();

    /**
     * @return array(BlockInterface)
     */
    function getWidgets();

    /**
     * Options will specify the options parameter in the json
     * @return array()
     */
    function getOptions();
}
