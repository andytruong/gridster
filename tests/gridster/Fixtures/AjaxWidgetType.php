<?php

namespace GO1\Gridster\Tests\Fixtures;

use GO1\Gridster\Source\WidgetTypeInterface;

class AjaxWidgetType implements WidgetTypeInterface
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
