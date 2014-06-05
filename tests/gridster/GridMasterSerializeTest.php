<?php

namespace GO1\Gridster\Tests;

use GO1\Gridster\GridMaster\GridMasterWidgetBase as GridMasterWidget;

class GridMasterSerializeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return \GO1\Gridster\GridMaster\GridMasterInterface
     */
    private function getGridMaster()
    {
        return new Fixtures\GridMaster();
    }

    private function getGridMasterWidget()
    {
        $gm_widget = new GridMasterWidget();
        $gm_widget->setId('widget-1');
        $gm_widget->setTitle('Demo widget #1');
        $gm_widget->setLabel('Just a demo widget');
        return $gm_widget;
    }

    public function testSerialize()
    {
        $gm = $this->getGridMaster();
        $gm->setId(123);
        $gm->setLabel('Demo Gridmaster');
        $gm->setTitle('Hello Gridmaster');
        $gm->setOptions([
            'margin' => [10, 10]
            , 'columns' => 6
            , 'width' => 'auto'
            , 'attributes' => [
                'id' => 'grid-master-id'
                , 'class' => 'grid-master-class'
            ]
        ]);
        $gm->addWidget($gm_widget = $this->getGridMasterWidget());
        $this->assertJson($json = $gm->dumpJSON());
    }

    public function ___testUnserialize()
    {
        $gm = Fixtures\GridMaster::importFromJSON($json);
        $this->assertInstanceOf('GO1\Gridster\GridMaster\GridMasterInterface', $gm);
    }

}
