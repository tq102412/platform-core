<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: coupon.proto

namespace Protoc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protoc.GetByIdRequest</code>
 */
class GetByIdRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .protoc.CouponId couponIds = 1;</code>
     */
    private $couponIds;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Protoc\CouponId[]|\Google\Protobuf\Internal\RepeatedField $couponIds
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Coupon::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .protoc.CouponId couponIds = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCouponIds()
    {
        return $this->couponIds;
    }

    /**
     * Generated from protobuf field <code>repeated .protoc.CouponId couponIds = 1;</code>
     * @param \Protoc\CouponId[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCouponIds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Protoc\CouponId::class);
        $this->couponIds = $arr;

        return $this;
    }

}
