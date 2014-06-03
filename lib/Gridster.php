<?php

namespace GO1\Gridster;

use GO1\Gridster\Block\BlockParserInterface;
use GO1\Gridster\Grid\GridInterface;
use GO1\Gridster\Block\BlockInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;

class Gridster
{

    protected $normalizers;
    protected $encoders;
    protected $serializer;

    function __construct($normalizers, $encoders)
    {
        if (!is_array($normalizers)) {
            $this->normalizers = array($normalizers);
        }
        else {
            $this->normalizers = $normalizers;
        }

        if (!is_array($encoders)) {
            $this->encoders = array($encoders);
        }
        else {
            $this->encoders = $encoders;
        }
    }

    function outputGridster(GridInterface $grid, $format = 'json')
    {
        $this->serializer = new Serializer($this->normalizers, $this->encoders);
        return $this->serializer->serialize($grid, $format);
    }

}
