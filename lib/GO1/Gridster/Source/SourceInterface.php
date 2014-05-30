<?php

namespace GO1\Gridster\Source;

interface SourceInterface{
    /**
     * @return int
     */
    function getId();

    /**
     * @return string
     */
    function getType();
}