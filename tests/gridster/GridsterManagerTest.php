<?php

namespace GO1\Gridster\Tests;

use GO1\Gridster\Tests\Fixtures\Factory;

class GridsterManagerTest extends \PHPUnit_Framework_TestCase
{

    public function testObject()
    {
        $this->assertInstanceOf('GO1\Gridster\GridsterManagerInterface', Factory::getGridsterManager());
    }

    public function testSetGet()
    {
        $m = Factory::getGridsterManager();
        $this->assertEmpty($m->getWidgetTypes());

        $m->registerDefaultWidgetTypes();
        $widget_types = $m->getWidgetTypes();
        $this->assertArrayHasKey('base', $widget_types);

        $this->assertInstanceOf(
            'GO1\Gridster\Widget\WidgetTypeBase',
            $m->getWidgetType('base')
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testUnregisterWidget()
    {
        $m = Factory::getGridsterManager();
        $m->unregisterWidgetType('base');
        $m->getWidgetType('base');
    }

    /**
     * @expectedException RuntimeException
     * @expectedExceptionMessage Cannot override frozen widget type "base".
     */
    public function testRegisterFrozen()
    {
        $m = Factory::getGridsterManager();
        $m->registerDefaultWidgetTypes();
        $m->registerWidgetType('base', 'GO1\Gridster\Widget\WidgetTypeBase');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRegisterExceptionWrongClass()
    {
        Factory::getGridsterManager()->registerWidgetType('foo', 'XZY');
    }

    /**
     * @@expectedException InvalidArgumentException
     */
    public function testRegisterExceptionWrongInterface()
    {
        Factory::getGridsterManager()->registerWidgetType('foo', 'DateTime');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetException()
    {
        Factory::getGridsterManager()->getWidgetType('foo');
    }

}
