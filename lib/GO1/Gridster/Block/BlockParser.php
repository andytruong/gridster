<?php

namespace GO1\Gridster\Block;

use GO1\Gridster\Configuration\AbstractGridConfiguration;
use GO1\Gridster\Source\SourceParserFactory;

class BlockParser implements BlockParserInterface{

    private $sourceParserFactory;

    function __construct(SourceParserFactory $sourceParserFactory){
        $this->sourceParserFactory = $sourceParserFactory;
    }

    private function parseBlock(BlockInterface $block){
        return array(
            'id'=>$block->getId(),
            'title'=>$block->getTitle()
        );
    }

    private function parseConfiguration(BlockInterface $block){
        $config = $block->getConfiguration();
        return !empty($config)?$config:array();
    }

    private function parseSource($source){
        $sourceParser = $this->sourceParserFactory->get($source);
        return $sourceParser->parse($source);
    }

    function parse(BlockInterface $block){

        $output = $this->parseBlock($block);
        $output = array_merge($output, $this->parseConfiguration($block));
        $source = $block->getSource();
        $output = array_merge($output, $this->parseSource($source));

        return (object) $output;
    }
}