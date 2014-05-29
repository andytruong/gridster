<?php

namespace GO1\Gridster\GridMaster;
use GO1\Gridster\Configuration\AbstractGridConfiguration;
use GO1\Gridster\Block\BlockInterface;

interface GridMasterInterface{
    function getId();
    function getTitle();
    function getBlocks();
    function addBlock(BlockInterface $block);
    function setConfiguration(AbstractGridConfiguration $configuration);
    function getConfiguration();
}