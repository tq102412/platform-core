<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: coupon.proto

namespace Protoc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protoc.MemberCoupons</code>
 */
class MemberCoupons extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .protoc.MemberCoupon memberCoupons = 1;</code>
     */
    private $memberCoupons;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Protoc\MemberCoupon[]|\Google\Protobuf\Internal\RepeatedField $memberCoupons
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Coupon::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .protoc.MemberCoupon memberCoupons = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMemberCoupons()
    {
        return $this->memberCoupons;
    }

    /**
     * Generated from protobuf field <code>repeated .protoc.MemberCoupon memberCoupons = 1;</code>
     * @param \Protoc\MemberCoupon[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMemberCoupons($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Protoc\MemberCoupon::class);
        $this->memberCoupons = $arr;

        return $this;
    }

}

