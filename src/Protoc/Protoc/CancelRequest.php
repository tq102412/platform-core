<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: coupon.proto

namespace Protoc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protoc.CancelRequest</code>
 */
class CancelRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated string coupon_codes = 1;</code>
     */
    private $coupon_codes;
    /**
     * Generated from protobuf field <code>string company_id = 2;</code>
     */
    private $company_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $coupon_codes
     *     @type string $company_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Coupon::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated string coupon_codes = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCouponCodes()
    {
        return $this->coupon_codes;
    }

    /**
     * Generated from protobuf field <code>repeated string coupon_codes = 1;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCouponCodes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->coupon_codes = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string company_id = 2;</code>
     * @return string
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * Generated from protobuf field <code>string company_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCompanyId($var)
    {
        GPBUtil::checkString($var, True);
        $this->company_id = $var;

        return $this;
    }

}

