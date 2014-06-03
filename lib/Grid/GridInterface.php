<?php

namespace GO1\Gridster\Grid;

use GO1\Gridster\Block\BlockInterface;

interface GridInterface
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
    function getBlocks();

    /**
     * Options will specify the options parameter in the json
     * @return array()
     */
    function getOptions();
}
