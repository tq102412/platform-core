<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: member.proto

namespace Protoc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protoc.MembersResult</code>
 */
class MembersResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .protoc.Members members = 1;</code>
     */
    private $members;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Protoc\Members[]|\Google\Protobuf\Internal\RepeatedField $members
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Member::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .protoc.Members members = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Generated from protobuf field <code>repeated .protoc.Members members = 1;</code>
     * @param \Protoc\Members[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMembers($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Protoc\Members::class);
        $this->members = $arr;

        return $this;
    }

}

