<?php

/**
 * Contains GO1\Gridster\GridMaster\GridMasterWidgetInterface
 */

namespace GO1\Gridster\GridMaster;

use GO1\Gridster\Widget\WidgetInterface;

/**
 * Defines common interface for gridmaster widget.
 */
interface GridMasterWidgetInterface
{
    /**
     * Getter for id property
     *
     * @return string
     */
    public function getId();

    /**
     * Setter for widget property.
     *
     * @param WidgetInterface $widget
     */
    public function setWidget(WidgetInterface $widget);

    /**
     * Getter for widget property.
     *
     * @return WidgetInterface
     */
    public function getWidget();

    /**
     * Setter for row property.
     *
     * @param int $row
     */
    public function setRow($row);

    /**
     * Getter for row property.
     *
     * @return int
     */
    public function getRow();

    /**
     * Setter for col property.
     *
     * @param int $col
     */
    public function setCol($col);

    /**
     * Getter for col property.
     *
     * @return int
     */
    public function getCol();

    /**
     * Setter for sizex property.
     *
     * @param int $size_x
     */
    public function setSizeX($size_x);

    /**
     * Getter for sizex property.
     *
     * @return int
     */
    public function getSizeX();

    /**
     * Setter for sizey property.
     *
     * @param int $size_y
     */
    public function setSizeY($size_y);

    /**
     * Getter for sizey property.
     *
     * @return int
     */
    public function getSizeY();
}
