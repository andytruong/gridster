<?php

namespace GO1\Gridster\Tests\GridMaster;

use GO1\Gridster\GridMaster\GridMasterWidgetBase as GridMasterWidget;
use GO1\Gridster\Tests\Fixtures\GridMaster;
use GO1\Gridster\Tests\Fixtures\Factory;

class GridMasterSerializeTest extends \PHPUnit_Framework_TestCase
{

    public function testSerialize()
    {
        $gm = Factory::getGridMaster();
        $gm->setId(123);
        $gm->setLabel('Demo Gridmaster');
        $gm->setTitle('Hello Gridmaster');
        $gm->setOptions(array(
            'margin' => array(10, 10)
            , 'columns' => 6
            , 'width' => 'auto'
            , 'attributes' => array(
                'id' => 'grid-master-id'
                , 'class' => 'grid-master-class'
            )
        ));

        $gm_widget = Factory::getGridMasterWidget();
        $gm_widget->setGridMaster($gm);

        $gm->addWidget($gm_widget);
        $this->assertJson($json = $gm->dumpJSON());

        return $json;
    }

    public function testUnserialize()
    {
        $gm = GridMaster::importFromJSON($json = $this->testSerialize());
        $this->assertInstanceOf('GO1\Gridster\GridMaster\GridMasterInterface', $gm);
    }

}
