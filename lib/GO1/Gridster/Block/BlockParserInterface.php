<?php

namespace GO1\Gridster\Block;

interface BlockParserInterface{
    function parse(BlockInterface $block);
}