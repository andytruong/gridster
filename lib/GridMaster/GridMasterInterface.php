<?php

namespace GO1\Gridster\GridMaster;

use GO1\Gridster\GridMaster\Helper\RenderInterface;

interface GridMasterInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return <GridMasterWidget>
     */
    public function getWidgets();

    /**
     * Get a widget added to grid-master.
     *
     * @param string $id
     * @return GridMasterWidgetInterface
     */
    public function getWidget(string $id);

    /**
     * Add a widget interface to grid-master.
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
     */
    public function removeWidgetById(string $gm_widget_id);

    /**
     * Setter for render property.
     *
     * @param RenderInterface $render
     */
    public function setRender(RenderInterface $render);

    /**
     * Getter for render property.
     *
     * @return RenderInterface
     */
    public function getRender();

    /**
     * Return list of available options: ['widget_selector', 'widget_margins', …]
     *
     * @return <string>
     */
    public function getAvailableOptions();

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
    public static function importFromJSON(string $json);
}
