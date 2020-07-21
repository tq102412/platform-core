<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: coupon.proto

namespace Protoc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protoc.ReceivingRequest</code>
 */
class ReceivingRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string coupon_id = 1;</code>
     */
    protected $coupon_id = '';
    /**
     * Generated from protobuf field <code>string member_union_id = 2;</code>
     */
    protected $member_union_id = '';
    /**
     * Generated from protobuf field <code>int32 quantity = 3;</code>
     */
    protected $quantity = 0;
    /**
     * Generated from protobuf field <code>int32 money = 4;</code>
     */
    protected $money = 0;
    /**
     * Generated from protobuf field <code>string activity_id = 5;</code>
     */
    protected $activity_id = '';
    /**
     * Generated from protobuf field <code>int32 source = 6;</code>
     */
    protected $source = 0;
    /**
     * Generated from protobuf field <code>string source_id = 7;</code>
     */
    protected $source_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $coupon_id
     *     @type string $member_union_id
     *     @type int $quantity
     *     @type int $money
     *     @type string $activity_id
     *     @type int $source
     *     @type string $source_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Coupon::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string coupon_id = 1;</code>
     * @return string
     */
    public function getCouponId()
    {
        return $this->coupon_id;
    }

    /**
     * Generated from protobuf field <code>string coupon_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCouponId($var)
    {
        GPBUtil::checkString($var, True);
        $this->coupon_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string member_union_id = 2;</code>
     * @return string
     */
    public function getMemberUnionId()
    {
        return $this->member_union_id;
    }

    /**
     * Generated from protobuf field <code>string member_union_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMemberUnionId($var)
    {
        GPBUtil::checkString($var, True);
        $this->member_union_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 quantity = 3;</code>
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Generated from protobuf field <code>int32 quantity = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setQuantity($var)
    {
        GPBUtil::checkInt32($var);
        $this->quantity = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 money = 4;</code>
     * @return int
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Generated from protobuf field <code>int32 money = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setMoney($var)
    {
        GPBUtil::checkInt32($var);
        $this->money = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string activity_id = 5;</code>
     * @return string
     */
    public function getActivityId()
    {
        return $this->activity_id;
    }

    /**
     * Generated from protobuf field <code>string activity_id = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setActivityId($var)
    {
        GPBUtil::checkString($var, True);
        $this->activity_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 source = 6;</code>
     * @return int
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Generated from protobuf field <code>int32 source = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setSource($var)
    {
        GPBUtil::checkInt32($var);
        $this->source = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string source_id = 7;</code>
     * @return string
     */
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * Generated from protobuf field <code>string source_id = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setSourceId($var)
    {
        GPBUtil::checkString($var, True);
        $this->source_id = $var;

        return $this;
    }

}

