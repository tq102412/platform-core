<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: follow.proto

namespace Follow;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Follow.FollowIds</code>
 */
class FollowIds extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated string follow_ids = 1;</code>
     */
    private $follow_ids;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $follow_ids
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Follow::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated string follow_ids = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFollowIds()
    {
        return $this->follow_ids;
    }

    /**
     * Generated from protobuf field <code>repeated string follow_ids = 1;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFollowIds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->follow_ids = $arr;

        return $this;
    }

}

