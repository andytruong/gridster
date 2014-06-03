<?php

namespace GO1\Gridster\Tests;

use GO1\Gridster\GridMaster\GridMasterInterface;
use GO1\Gridster\Gridster;
use GO1\Gridster\Normalizer\GridNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

class GridsterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var GridMasterInterface
     */
    protected $grid;

    public function setUp()
    {
        $source = new Fixtures\WidgetType(1, 'default');
        $source2 = new Fixtures\WidgetType(2, 'default');
        $block = new Fixtures\Widget(1, 'default', 'Block 1', $source, array('sizeX' => 1, 'sizeY' => 2, 'col' => 1, 'row' => 1));
        $block2 = new Fixtures\Widget(2, 'default', 'Block 1', $source2, array('sizeX' => 1, 'sizeY' => 2, 'col' => 2, 'row' => 1));
        $this->grid = new Fixtures\GridMaster(1, 'Test Grid', array());
        $this->grid->addWidget($gm_widget);
        $this->grid->addBlock($block);
        $this->grid->addBlock($block2);
    }

    public function tearDown()
    {

    }

    /**
     * Global test to ensure that it can output into json
     */
    public function testGridsterJson()
    {
        $normalizer = new GridNormalizer();
        $encoder = new JsonEncoder();
        $gridster = new Gridster(array($normalizer), array($encoder));
        $json = $gridster->outputGridster($this->grid, 'json');
        $expected_json = file_get_contents(__DIR__ . "/Fixtures/data/result.json");
        $this->assertEquals($expected_json, $json);
    }

    /**
     * Global test to ensure that it can output to xml
     */
    public function testGridsterXML()
    {
        $normalizer = new GridNormalizer();
        $encoder = new XmlEncoder();
        $gridster = new Gridster(array($normalizer), array($encoder));
        $xml = $gridster->outputGridster($this->grid, 'xml');
        $expected_xml = file_get_contents(__DIR__ . "/Fixtures/data/result.xml");
        $this->assertEquals($expected_xml, $xml);
    }

    /**
     * Test to ensure that extra parameters can be added
     */
    public function testAdvancedBlockSource()
    {
        $source = new SourceEntityAjax(3, 'entity', 'http://www.example.com');
        $block = new BlockEntityTwoCol(4, 'twoCol', 'Two Col type block', $source, array('sizeX' => 1, 'sizeY' => 2, 'col' => 2, 'row' => 1));
        $this->grid->addBlock($block);

        $normalizer = new GridNormalizer();
        $encoder = new JsonEncoder();
        $gridster = new Gridster(array($normalizer), array($encoder));
        $json = $gridster->outputGridster($this->grid, 'json');
        $expected_json = file_get_contents(__DIR__ . "/Fixtures/data/advanced_result.json");
        $this->assertEquals($expected_json, $json);
    }

}
