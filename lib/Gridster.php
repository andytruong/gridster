<?php

/**
 * Contains GO1\Gridster\Gridster
 */

namespace GO1\Gridster;

use GO1\Gridster\GridMaster\GridMasterInterface;
use Symfony\Component\Serializer\Serializer;

/**
 * Gridster manager class.
 */
class Gridster
{

    /**
     * Normalizers
     */
    protected $normalizers;

    /**
     * Encoders
     */
    protected $encoders;

    /**
     * Serializer
     */
    protected $serializer;

    /**
     * Constructure.
     *
     * @param array $normalizers
     * @param array $encoders
     */
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

    /**
     * Serialize…
     *
     * @param \GO1\Gridster\GridMaster\GridMasterInterface $grid
     * @param string $format
     * @return mixed
     */
    function outputGridster(GridMasterInterface $grid, $format = 'json')
    {
        $this->serializer = new Serializer($this->normalizers, $this->encoders);
        return $this->serializer->serialize($grid, $format);
    }

}
