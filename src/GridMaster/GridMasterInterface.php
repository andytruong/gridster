<?php

/**
 * Contains GO1\Gridster\GridMaster\GridMasterInterface
 */

namespace GO1\Gridster\GridMaster;

use GO1\Gridster\GridsterManagerInterface;

/**
 * Defines a commons interface for grid-masters.
 *
 * @todo Missing methods:
 *  - Getter/Setter for css/js/context.
 */
interface GridMasterInterface
{

    /**
     * Setter for gridster_manager property.
     *
     * @param \GO1\Gridster\GridsterManagerInterface $gridster_manager
     */
    public function setGridsterManager(GridsterManagerInterface $gridster_manager);

    /**
     * Getter for gridster_manager property.
     *
     * @return GridsterManagerInterface
     */
    public function getGridsterManager();

    /**
     * Setter for id property.
     *
     * @param string $id
     */
    public function setId($id);

    /**
     * Getter for id property.
     *
     * @return int
     */
    public function getId();

    /**
     * Setter for title property.
     *
     * @param string $label
     */
    public function setLabel($label);

    /**
     * Getter for title property.
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
     * Get all widgets added to grid-master.
     *
     * @return GridMasterWidget[]
     */
    public function getWidgets();

    /**
     * Get a widget added to grid-master.
     *
     * @param string $id
     * @return GridMasterWidgetInterface
     */
    public function getWidget($id);

    /**
     * Add a widget interface to grid-master.
     *
     * @param GridMasterWidgetInterface $gm_widget
     */
    public function addWidget(GridMasterWidgetInterface $gm_widget);

    /**
     * Remove all widgets.
     */
    public function removeAllWidgets();

    /**
     * Remove a widget from grid-master
     *
     * @param GridMasterWidgetInterface $gm_widget
     */
    public function removeWidget(GridMasterWidgetInterface $gm_widget);

    /**
     * Remove a widget from grid-master by ID.
     *
     * @param string $gm_widget_id
     */
    public function removeWidgetById($gm_widget_id);

    /**
     * Return list of available options: ['widget_selector', 'widget_margins', …]
     *
     * @return string[]
     */
    public function getAvailableOptions();

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
     * Options will specify the options parameter in the json.
     *
     * @return array
     */
    public function getOptions();

    /**
     * Static method to create new grid-master object from json.
     *
     * @param string $json
     * @return GridMasterInterface
     */
    public static function importFromJSON($json);

    /**
     * Dump grid-master object to json format.
     *
     * @return string
     */
    public function dumpJSON();
}
