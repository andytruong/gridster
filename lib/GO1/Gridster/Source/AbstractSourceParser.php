<?php

namespace GO1\Gridster\Source;

abstract class SourceParser implements SourceParserInterface{

    function parse(SourceInterface $source)
    {
        $output['type'] = $source->getType();
        return (object)$output;
    }
}