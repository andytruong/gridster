<?php

namespace GO1\Gridster\GridMaster;

use Symfony\Component\Serializer\Serializer,
    Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer,
    Symfony\Component\Serializer\Encoder\JsonEncoder,
    GO1\Gridster\GridsterManagerInterface;

abstract class GridMasterBase implements GridMasterInterface
{

    /**
     * @var GridsterManagerInterface
     */
    protected $gridster_manager;

    /**
     * ID of grid-master.
     *
     * @var string
     */
    protected $id;

    /**
     * Admin displaying name.
     *
     * @var string
     */
    protected $label;

    /**
     * Displaying title, visible to end user.
     *
     * @var string
     */
    protected $title;

    /**
     * Grid-master displaying options, available key/value are:
     *
     *  - margins: [int, int]
     *  - columns: int
     *  - width: 'auto', '0%' - '100%' or int (pixel)
     *  - attributes: [ id: 'ID for wrapper DOM', 'class': 'classes-for-wrapper-DOM' ]
     *
     * @var array
     */
    protected $options;

    /**
     * Context values for grid-master.
     *
     * @var array
     */
    protected $context;

    /**
     * List of JS to be attached to grid-master.
     *
     * @var string[]
     */
    protected $js;

    /**
     * List of CSS to be attached to grid-master.
     *
     * @var string
     */
    protected $css;

    /**
     * List of widget attached to grid-master.
     *
     * @var GridMasterWidgetInterface[]
     */
    protected $widgets;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @inheritedoc
     * @param \GO1\Gridster\GridsterManagerInterface $gridster_manager
     */
    public function setGridsterManager(GridsterManagerInterface $gridster_manager)
    {
        $this->gridster_manager = $gridster_manager;
    }

    /**
     * @inheritedoc
     * @return GridsterManagerInterface
     */
    public function getGridsterManage()
    {
        return $this->gridster_manager;
    }

    /**
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @inheritedoc
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritedoc
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @inheritedoc
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @inheritedoc
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @inheritedoc
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @inheritedoc
     * @return GridMasterWidget[]
     */
    public function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * @inheritedoc
     * @param string $id
     * @return GridMasterWidgetInterface
     */
    public function getWidget($id)
    {
        return isset($this->widgets[$id]) ? $this->widgets[$id] : null;
    }

    /**
     * @inheritedoc
     * @param GridMasterWidgetInterface $gm_widget
     */
    public function addWidget(GridMasterWidgetInterface $gm_widget)
    {
        $this->widgets[$gm_widget->getId()] = $gm_widget;
    }

    /**
     * Remove all widgets.
     */
    public function removeAllWidgets()
    {
        $this->widgets = array();
    }

    /**
     * @inheritedoc
     * @param GridMasterWidgetInterface $gm_widget
     */
    public function removeWidget(GridMasterWidgetInterface $gm_widget)
    {
        return $this->removeWidgetById($gm_widget->getId());
    }

    /**
     * @inheritedoc
     * @param string $gm_widget_id
     */
    public function removeWidgetById($gm_widget_id)
    {
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
    public function getAvailableOptions()
    {
        return array('any', 'thing');
    }

    /**
     * @inheritedoc
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * @inheritedoc
     * @param string $key
     * @param mixed $value
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
    }

    /**
     * @inheritedoc
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     *
     * @return Serializer
     */
    public function getSerializer()
    {
        if (is_null($this->serializer)) {
            $normalizer = new GetSetMethodNormalizer();
            $normalizer->setIgnoredAttributes(array('serializer', 'availableOptions', 'widget'));
            $encoders = array(new JsonEncoder());
            $this->serializer = new Serializer(array($normalizer), $encoders);
        }
        return $this->serializer;
    }

    /**
     * @inheritedoc
     * @param string $json
     * @return GridMasterInterface
     */
    public static function importFromJSON($json)
    {
        $me = new static;
        return $me->getSerializer()->deserialize($json, get_class($me), 'json');
    }

    /**
     * @inheritedoc
     * @return string
     */
    public function dumpJSON()
    {
        return $this->getSerializer()->serialize($this, 'json');
    }

}
