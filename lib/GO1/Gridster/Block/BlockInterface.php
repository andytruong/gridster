<?php

namespace GO1\Gridster\Block;

use GO1\Gridster\Configuration\ConfigurationInterface;
use GO1\Gridster\Source\SourceInterface;

interface BlockInterface{
    function getId();
    function getType();
    function getTitle();
    function getSource();
    function setSource(SourceInterface $source);
    function getConfiguration();
    function setConfiguration(ConfigurationInterface $config);
}