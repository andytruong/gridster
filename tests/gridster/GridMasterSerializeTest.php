<?php

namespace GO1\Gridster\Tests;

use GO1\Gridster\GridMaster\GridMasterWidgetBase as GridMasterWidget;

class GridMasterSerializeTest extends \PHPUnit_Framework_TestCase
{

    public function testSerialize()
    {
        $gm = Fixtures\Factory::getGridMaster();
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
        $gm->addWidget($gm_widget = Fixtures\Factory::getGridMasterWidget());
        $this->assertJson($json = $gm->dumpJSON());
        return $json;
    }

    public function testUnserialize()
    {
        $gm = Fixtures\GridMaster::importFromJSON($json = $this->testSerialize());
        $this->assertInstanceOf('GO1\Gridster\GridMaster\GridMasterInterface', $gm);
    }

}
