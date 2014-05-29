<?php

namespace GO1\Gridster;

use GO1\Gridster\Block\BlockParserInterface;
use GO1\Gridster\Configuration\ConfigurationParser;
use GO1\Gridster\GridMaster\GridMasterInterface;
use GO1\Gridster\Block\BlockInterface;
use GO1\Gridster\Output\OutputInterface;

class Gridster implements GridsterInterface{

    protected $blocks = array();
    protected $outputClass;
    protected $blockParser;

    function __construct(BlockParserInterface $blockParser, OutputInterface $outputClass){
        $this->outputClass = $outputClass;
        $this->blockParser = $blockParser;
    }


    function outputGridster(GridMasterInterface $gridMaster)
    {
        //Get the configuration
        $output = new \stdClass();
        $output->id = $gridMaster->getId();
        $output->title = $gridMaster->getTitle();

        //Configuration
        $output->configuration = $gridMaster->getConfiguration();

        //Get the children of gridMasterInterface
        $blocks = $gridMaster->getBlocks();

        if(!empty($blocks)){
            foreach($blocks as $block){
                if(!$block instanceof BlockInterface){
                    throw new \Exception("Block needs to implement BlockInterface");
                }
                $output->blocks[] = $this->blockParser->parse($block);
            }
        }

        //Type of output
        return $this->outputClass->output($output);
    }

    function getAttributes(){
        return $this->attributes;
    }

    function getBlocks(){
        return $this->blocks;
    }
}
