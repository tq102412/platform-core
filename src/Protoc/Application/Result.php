<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: application.proto

namespace Application;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>application.Result</code>
 */
class Result extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>bool status = 1;</code>
     */
    private $status = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $status
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Application::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>bool status = 1;</code>
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Generated from protobuf field <code>bool status = 1;</code>
     * @param bool $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkBool($var);
        $this->status = $var;

        return $this;
    }

}

