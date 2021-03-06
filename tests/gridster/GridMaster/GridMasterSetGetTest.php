<?php

namespace GO1\Gridster\Tests\GridMaster;

use GO1\Gridster\Tests\Fixtures\Factory;

class GridMasterSetGetTest extends \PHPUnit_Framework_TestCase
{

    public function testGridMasterSetGet()
    {
        $gm = Factory::getGridMaster();

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
        $widget_01 = Factory::getWidget('getSetWidget01');
        $widget_02 = Factory::getWidget('getSetWidget02');
        $widget_03 = Factory::getWidget('getSetWidget03');
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

    public function testGridMasterWidget() {
        $gm = Factory::getGridMaster();
        $gmw = Factory::getWidget();
        $gmw->setGridMaster($gm);

        $widget_type = $gmw->getWidgetType();
        $this->assertInstanceOf('GO1\Gridster\Widget\WidgetTypeBase', $widget_type);

        $this->assertEquals('base', $widget_type->getName());
        $this->assertEquals('Base Widget Type', $widget_type->getLabel());
        $this->assertEquals('Most simple widget type.', $widget_type->getDescription());
        $this->assertEquals(array('text'), $widget_type->getAvailableOptions());
    }

}
