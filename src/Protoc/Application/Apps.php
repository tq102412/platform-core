<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: application.proto

namespace Application;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>application.Apps</code>
 */
class Apps extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .application.App apps = 1;</code>
     */
    private $apps;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Application\App[]|\Google\Protobuf\Internal\RepeatedField $apps
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Application::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .application.App apps = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getApps()
    {
        return $this->apps;
    }

    /**
     * Generated from protobuf field <code>repeated .application.App apps = 1;</code>
     * @param \Application\App[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setApps($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Application\App::class);
        $this->apps = $arr;

        return $this;
    }

}

