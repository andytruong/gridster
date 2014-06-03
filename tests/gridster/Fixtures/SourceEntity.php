<?php

namespace GO1\Gridster\Tests\Fixtures;

use GO1\Gridster\Source\SourceInterface;

class SourceEntity implements SourceInterface
{

    protected $id;
    protected $type;

    public function __construct($id, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
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
