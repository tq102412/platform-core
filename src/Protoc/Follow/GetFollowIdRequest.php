<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: follow.proto

namespace Follow;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Follow.GetFollowIdRequest</code>
 */
class GetFollowIdRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string union_id = 1;</code>
     */
    private $union_id = '';
    /**
     * Generated from protobuf field <code>int32 platform_type = 5;</code>
     */
    private $platform_type = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $union_id
     *     @type int $platform_type
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Follow::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string union_id = 1;</code>
     * @return string
     */
    public function getUnionId()
    {
        return $this->union_id;
    }

    /**
     * Generated from protobuf field <code>string union_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setUnionId($var)
    {
        GPBUtil::checkString($var, True);
        $this->union_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 platform_type = 5;</code>
     * @return int
     */
    public function getPlatformType()
    {
        return $this->platform_type;
    }

    /**
     * Generated from protobuf field <code>int32 platform_type = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setPlatformType($var)
    {
        GPBUtil::checkInt32($var);
        $this->platform_type = $var;

        return $this;
    }

}
