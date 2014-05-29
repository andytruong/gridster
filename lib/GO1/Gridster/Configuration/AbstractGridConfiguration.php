<?php
namespace GO1\Gridster\Configuration;

Abstract Class AbstractGridConfiguration implements ConfigurationInterface{

    private $configuration = array(

    );

    function getConfiguration(){
        return $this->configuration;
    }

    function addConfiguration($key, $value){
        $this->configuration[$key] = $value;
    }

    function removeConfiguration($key){
        unset($this->configuration[$key]);
    }

    function setConfiguration($configuration){
        $this->configuration = $configuration;
    }
}