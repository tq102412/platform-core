<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: coupon.proto

namespace Protoc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protoc.Coupons</code>
 */
class Coupons extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .protoc.Coupon coupons = 1;</code>
     */
    private $coupons;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Protoc\Coupon[]|\Google\Protobuf\Internal\RepeatedField $coupons
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Coupon::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .protoc.Coupon coupons = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCoupons()
    {
        return $this->coupons;
    }

    /**
     * Generated from protobuf field <code>repeated .protoc.Coupon coupons = 1;</code>
     * @param \Protoc\Coupon[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCoupons($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Protoc\Coupon::class);
        $this->coupons = $arr;

        return $this;
    }

}

