<?php

/**
 * Contains GO1\Gridster\GridMaster\GridMasterWidgetInterface
 */

namespace GO1\Gridster\Widget;

use GO1\Gridster\GridMaster\GridMasterInterface;

/**
 * Defines common interface for gridmaster widget.
 */
interface WidgetInterface
{

    public function setGridMaster(GridMasterInterface $grid_master);

    /**
     * Setter for id property.
     *
     * @param string $id
     */
    public function setId($id);

    /**
     * Getter for id property
     *
     * @return string
     */
    public function getId();

    /**
     * Setter for label property.
     *
     * @param string $label
     */
    public function setLabel($label);

    /**
     * Getter for label property.
     *
     * @return string
     */
    public function getLabel();

    /**
     * Setter for title property.
     *
     * @param string $title
     */
    public function setTitle($title);

    /**
     * Getter for title property.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Setter for css property.
     *
     * @param string[] $paths
     */
    public function setCss(array $paths);

    /**
     * Getter for css property.
     *
     * @return string[]
     */
    public function getCss();

    /**
     * Setter for js property.
     *
     * @param string[] $paths
     */
    public function setJs(array $paths);

    /**
     * Getter for js property.
     *
     * @return string[]
     */
    public function getJs();

    /**
     * Setter for widget property.
     *
     * @param string $widget
     */
    public function setWidgetType($widget);

    /**
     * Getter for widget property.
     *
     * @return WidgetInterface
     */
    public function getWidgetType();

    /**
     * Setter for options property.
     *
     * @param array $options
     */
    public function setOptions(array $options);

    /**
     * Setter for single option.
     *
     * @param string $key
     * @param mixed $value
     */
    public function setOption($key, $value);

    /**
     * Getter for options property.
     *
     * @return array
     */
    public function getOptions();
}
