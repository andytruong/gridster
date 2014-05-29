<?php

/**
 * @todo Plugin system to extend Parser class extensions
 */
namespace GO1\Gridster\Source;


class SourceParserFactory{

    public static function get(SourceInterface $source)
    {
        $class = get_class($source);

        /*dummy*/
        $class = (string)'GO1\Bundle\GridsterBundle\Entity\SourceParser';

        if(class_exists($class)){
            return new $class();
        }else{
            throw new \Exception('Need a Parser class to parse through source object');
        }
    }
}