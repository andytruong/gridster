<?php

namespace GO1\Gridster\Tests;

class GridMasterSetGetTest extends \PHPUnit_Framework_TestCase
{

    public function testGridMasterSetGet()
    {
        $gm = Fixtures\Factory::getGridMaster();

        $this->assertInstanceOf('GO1\Gridster\GridMaster\GridMasterInterface', $gm);

        // Options
        $gm->setOption('foo', 'bar');
        $options = $gm->getOptions();
        $this->assertEquals('bar', $options['foo']);

        // Available options
        $this->assertEquals(array('any', 'thing'), $gm->getAvailableOptions());

        // Title
        $gm->setTitle('Test title');
        $this->assertEquals('Test title', $gm->getTitle());

        // Label
        $gm->setLabel('Test label');
        $this->assertEquals('Test label', $gm->getLabel());

        // Widgets
        $widget_01 = Fixtures\Factory::getGridMasterWidget('getSetWidget01');
        $widget_02 = Fixtures\Factory::getGridMasterWidget('getSetWidget02');
        $widget_03 = Fixtures\Factory::getGridMasterWidget('getSetWidget03');
        $gm->addWidget($widget_01);
        $gm->addWidget($widget_02);
        $gm->addWidget($widget_03);
        $this->assertEquals($widget_01, $gm->getWidget('getSetWidget01'));
        $this->assertEquals($widget_02, $gm->getWidget('getSetWidget02'));
        $this->assertEquals($widget_03, $gm->getWidget('getSetWidget03'));
        $this->assertCount(3, $gm->getWidgets());

        $gm->removeWidget($widget_01);
        $this->assertCount(2, $gm->getWidgets());
        $this->assertNull($gm->getWidget('getSetWidget01'));

        $gm->removeWidgetById('getSetWidget02');
        $this->assertCount(1, $gm->getWidgets());
        $this->assertNull($gm->getWidget('getSetWidget02'));

        $this->assertFalse($gm->removeWidgetById('invalidWidgetId'));

        $gm->removeAllWidgets();
        $this->assertCount(0, $gm->getWidgets());
    }

}
