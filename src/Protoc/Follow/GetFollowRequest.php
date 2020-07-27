<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: follow.proto

namespace Follow;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Follow.GetFollowRequest</code>
 */
class GetFollowRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string app_id = 1;</code>
     */
    protected $app_id = '';
    /**
     * Generated from protobuf field <code>string openid = 2;</code>
     */
    protected $openid = '';
    /**
     * Generated from protobuf field <code>string union_id = 3;</code>
     */
    protected $union_id = '';
    /**
     * Generated from protobuf field <code>string follow_id = 4;</code>
     */
    protected $follow_id = '';
    /**
     * Generated from protobuf field <code>int32 platform_type = 5;</code>
     */
    protected $platform_type = 0;
    /**
     * Generated from protobuf field <code>.Follow.FollowData data = 6;</code>
     */
    protected $data = null;
    /**
     * Generated from protobuf field <code>string platform_openid = 7;</code>
     */
    protected $platform_openid = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $app_id
     *     @type string $openid
     *     @type string $union_id
     *     @type string $follow_id
     *     @type int $platform_type
     *     @type \Follow\FollowData $data
     *     @type string $platform_openid
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Follow::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string app_id = 1;</code>
     * @return string
     */
    public function getAppId()
    {
        return $this->app_id;
    }

    /**
     * Generated from protobuf field <code>string app_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setAppId($var)
    {
        GPBUtil::checkString($var, True);
        $this->app_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string openid = 2;</code>
     * @return string
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * Generated from protobuf field <code>string openid = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setOpenid($var)
    {
        GPBUtil::checkString($var, True);
        $this->openid = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string union_id = 3;</code>
     * @return string
     */
    public function getUnionId()
    {
        return $this->union_id;
    }

    /**
     * Generated from protobuf field <code>string union_id = 3;</code>
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
     * Generated from protobuf field <code>string follow_id = 4;</code>
     * @return string
     */
    public function getFollowId()
    {
        return $this->follow_id;
    }

    /**
     * Generated from protobuf field <code>string follow_id = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setFollowId($var)
    {
        GPBUtil::checkString($var, True);
        $this->follow_id = $var;

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

    /**
     * Generated from protobuf field <code>.Follow.FollowData data = 6;</code>
     * @return \Follow\FollowData
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Generated from protobuf field <code>.Follow.FollowData data = 6;</code>
     * @param \Follow\FollowData $var
     * @return $this
     */
    public function setData($var)
    {
        GPBUtil::checkMessage($var, \Follow\FollowData::class);
        $this->data = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string platform_openid = 7;</code>
     * @return string
     */
    public function getPlatformOpenid()
    {
        return $this->platform_openid;
    }

    /**
     * Generated from protobuf field <code>string platform_openid = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setPlatformOpenid($var)
    {
        GPBUtil::checkString($var, True);
        $this->platform_openid = $var;

        return $this;
    }

}

