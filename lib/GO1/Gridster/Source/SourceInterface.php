<?php

namespace GO1\Gridster\Source;
use GO1\Gridster\Configuration\ConfigurationInterface;

interface SourceInterface{
    function getType();
    function getConfiguration();
    function setConfiguration(ConfigurationInterface $configuration);
}