<?php

namespace GO1\Gridster\GridMaster;

use GO1\Gridster\Widget\WidgetInterface;

interface GridMasterWidgetInterface
{

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
     * @param int $row
     */
    public function setRow($row);

    /**
     * @return int
     */
    public function getRow();

    /**
     * @param init @col
     */
    public function setCol($col);

    /**
     * @return int
     */
    public function getCol();

    /**
     * @param int $size_x
     */
    public function setSizeX($size_x);

    /**
     * @return int
     */
    public function getSizeX();

    /**
     * @param int $size_y
     */
    public function setSizeY($size_y);

    /**
     * @return int
     */
    public function getSizeY();
}
