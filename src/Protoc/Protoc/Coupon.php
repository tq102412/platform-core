<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: coupon.proto

namespace Protoc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protoc.Coupon</code>
 */
class Coupon extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string coupon_id = 1;</code>
     */
    private $coupon_id = '';
    /**
     * Generated from protobuf field <code>string title = 2;</code>
     */
    private $title = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $coupon_id
     *     @type string $title
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
     * Generated from protobuf field <code>string title = 2;</code>
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Generated from protobuf field <code>string title = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->title = $var;

        return $this;
    }

}
