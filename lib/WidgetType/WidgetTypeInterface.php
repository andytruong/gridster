<?php

namespace GO1\Gridster\Source;

interface WidgetTypeInterface
{

    /**
     * @return int
     */
    function getId();

    /**
     * @return string
     */
    function getType();
}
