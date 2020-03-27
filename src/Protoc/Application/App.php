<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: application.proto

namespace Application;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>application.App</code>
 */
class App extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 id = 1;</code>
     */
    private $id = 0;
    /**
     * Generated from protobuf field <code>string name = 2;</code>
     */
    private $name = '';
    /**
     * Generated from protobuf field <code>string logo = 3;</code>
     */
    private $logo = '';
    /**
     * Generated from protobuf field <code>string url = 4;</code>
     */
    private $url = '';
    /**
     * Generated from protobuf field <code>string describe = 5;</code>
     */
    private $describe = '';
    /**
     * Generated from protobuf field <code>int32 event_id = 6;</code>
     */
    private $event_id = 0;
    /**
     * Generated from protobuf field <code>int32 on_desktop = 7;</code>
     */
    private $on_desktop = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $id
     *     @type string $name
     *     @type string $logo
     *     @type string $url
     *     @type string $describe
     *     @type int $event_id
     *     @type int $on_desktop
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Application::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 id = 1;</code>
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Generated from protobuf field <code>int32 id = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt32($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string name = 2;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Generated from protobuf field <code>string name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string logo = 3;</code>
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Generated from protobuf field <code>string logo = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setLogo($var)
    {
        GPBUtil::checkString($var, True);
        $this->logo = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string url = 4;</code>
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Generated from protobuf field <code>string url = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->url = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string describe = 5;</code>
     * @return string
     */
    public function getDescribe()
    {
        return $this->describe;
    }

    /**
     * Generated from protobuf field <code>string describe = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setDescribe($var)
    {
        GPBUtil::checkString($var, True);
        $this->describe = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 event_id = 6;</code>
     * @return int
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Generated from protobuf field <code>int32 event_id = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setEventId($var)
    {
        GPBUtil::checkInt32($var);
        $this->event_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 on_desktop = 7;</code>
     * @return int
     */
    public function getOnDesktop()
    {
        return $this->on_desktop;
    }

    /**
     * Generated from protobuf field <code>int32 on_desktop = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setOnDesktop($var)
    {
        GPBUtil::checkInt32($var);
        $this->on_desktop = $var;

        return $this;
    }

}

