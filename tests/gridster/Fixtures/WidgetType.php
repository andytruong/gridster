<?php

namespace GO1\Gridster\Tests\Fixtures;

use GO1\Gridster\Source\WidgetTypeInterface;

class WidgetType implements WidgetTypeInterface
{

    protected $id;
    protected $name;

    public function __construct($id, $type)
    {
        $this->id = $id;
        $this->name = $type;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    /** These values are hardcoded for easier maintenance */
    public function getTitle()
    {
        return 'Source Title ' . $this->getId();
    }

    public function getSummary()
    {
        return 'Source Summary ' . $this->getId();
    }

    public function getImage()
    {
        return 'http://adurolms.com/sites/adurolms.com/files/new-aduro-image.png';
    }

}
