<?php
namespace GO1\Gridster\Configuration;

interface ConfigurationInterface{

    function getConfiguration();

    function addConfiguration($key, $value);

    function setConfiguration($configuration);

    function removeConfiguration($key);
}