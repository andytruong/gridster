<?php

namespace GO1\Gridster\Tests;

use GO1\Gridster\Source\SourceInterface;

class SourceEntityAjax implements SourceInterface
{

    protected $id;
    protected $type;
    protected $url;

    public function __construct($id, $type, $url)
    {
        $this->id = $id;
        $this->type = $type;
        $this->url = $url;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getUrl()
    {
        return $this->url;
    }

}
