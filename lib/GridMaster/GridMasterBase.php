<?php

namespace GO1\Gridster\GridMaster;

class GridMasterBase implements GridMasterInterface
{
    /**
     * ID of grid-master.
     *
     * @var string
     */
    private $id;

    /**
     * Admin displaying name.
     *
     * @var string
     */
    private $label;

    /**
     * Displaying title, visible to end user.
     *
     * @var string
     */
    private $title;

    /**
     * Grid-master displaying options, available key/value are:
     *
     *  - margins: [int, int]
     *  - columns: int
     *  - width: 'auto', '0%' - '100%' or int (pixel)
     *  - attributes: [ id: 'ID for wrapper DOM', 'class': 'classes-for-wrapper-DOM' ]
     *
     * @var string
     */
    private $options;

    /**
     * Context values for grid-master.
     *
     * @var array
     */
    private $context;

    /**
     * List of JS to be attached to grid-master.
     *
     * @var string[]
     */
    private $js;

    /**
     * List of CSS to be attached to grid-master.
     *
     * @var string
     */
    private $css;

    /**
     * List of widget attached to grid-master.
     *
     * @var GridMasterWidgetInterface[]
     */
    private $widgets;

    /**
     * @inheritedoc
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @inheritedoc
     * @param string $label
     */
    public function setLabel($label) {}

    /**
     * @inheritedoc
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @inheritedoc
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @inheritedoc
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @inheritedoc
     * @return GridMasterWidget[]
     */
    public function getWidgets() {
        return $this->widgets;
    }

    /**
     * @inheritedoc
     * @param string $id
     * @return GridMasterWidgetInterface
     */
    public function getWidget($id) {
        return isset($this->widgets[$id]) ? $this->widgets[$id] : null;
    }

    /**
     * @inheritedoc
     * @param GridMasterWidgetInterface $gm_widget
     */
    public function addWidget(GridMasterWidgetInterface $gm_widget) {
    }

    /**
     * Remove all widgets.
     */
    public function removeAllWidgets() {
        $this->widgets = array();
    }

    /**
     * @inheritedoc
     * @param GridMasterWidgetInterface $gm_widget
     */
    public function removeWidget(GridMasterWidgetInterface $gm_widget) {
        return $this->removeWidgetById($gm_widget->getId());
    }

    /**
     * @inheritedoc
     * @param string $gm_widget_id
     */
    public function removeWidgetById($gm_widget_id) {
        if (!isset($this->widgets[$gm_widget_id])) {
            return false;
        }

        unset($this->widgets[$gm_widget_id]);
        return true;
    }

    /**
     * @inheritedoc
     * @return string[]
     */
    public function getAvailableOptions() {}

    /**
     * @inheritedoc
     * @param array $options
     */
    public function setOptions(array $options) {}

    /**
     * @inheritedoc
     * @param string $key
     * @param mixed $value
     */
    public function setOption($key, $value) {}

    /**
     * @inheritedoc
     * @return array
     */
    public function getOptions() {}

    /**
     * @inheritedoc
     * @param string $json
     * @return GridMasterInterface
     */
    public static function importFromJSON($json) {}

    /**
     * @inheritedoc
     * @return string
     */
    public function dumpJSON() {
        return '{ "status": "coming…" }';
    }

}
