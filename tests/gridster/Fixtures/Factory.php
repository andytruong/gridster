<?php

namespace GO1\Gridster\Tests\Fixtures;

class Factory
{

    /**
     * @return \GO1\Gridster\GridsterManager
     */
    public static function getGridsterManager()
    {
        return new \GO1\Gridster\GridsterManager();
    }

    /**
     * @return \GO1\Gridster\GridMaster\GridMasterInterface
     */
    public static function getGridMaster()
    {
        $gm = new GridMaster();
        $gm->setGridsterManager(static::getGridsterManager());
        return $gm;
    }

    /**
     * @return \GO1\Gridster\Tests\Fixtures\GridMasterWidget
     */
    public static function getGridMasterWidget($id = 'widget-1', $type = 'base')
    {
        $gm_widget = new \GO1\Gridster\GridMaster\GridMasterWidgetBase();
        $gm_widget->setId($id);
        $gm_widget->setWidgetType('base');
        $gm_widget->setTitle('Demo widget #1');
        $gm_widget->setLabel('Just a demo widget');
        $gm_widget->setCss(array('http://example.com/style.css'));
        $gm_widget->setJs(array('http://example.com/script.js'));
        $gm_widget->setOptions(array('text' => 'Hello world!'));
        $gm_widget->setOption('fuz', 'baz');
        return $gm_widget;
    }

}
