<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: coupon.proto

namespace Protoc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protoc.CouponCreateRequest</code>
 */
class CouponCreateRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * 3
     *
     * Generated from protobuf field <code>int32 type = 1;</code>
     */
    private $type = 0;
    /**
     * Generated from protobuf field <code>int32 from_money = 2;</code>
     */
    private $from_money = 0;
    /**
     * Generated from protobuf field <code>int32 to_money = 3;</code>
     */
    private $to_money = 0;
    /**
     * Generated from protobuf field <code>string title = 4;</code>
     */
    private $title = '';
    /**
     * Generated from protobuf field <code>string company_id = 5;</code>
     */
    private $company_id = '';
    /**
     * Generated from protobuf field <code>string created_user_id = 6;</code>
     */
    private $created_user_id = '';
    /**
     * Generated from protobuf field <code>string activity_id = 7;</code>
     */
    private $activity_id = '';
    /**
     * Generated from protobuf field <code>int32 total_sku = 8;</code>
     */
    private $total_sku = 0;
    /**
     * Generated from protobuf field <code>int32 limit = 9;</code>
     */
    private $limit = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $type
     *           3
     *     @type int $from_money
     *     @type int $to_money
     *     @type string $title
     *     @type string $company_id
     *     @type string $created_user_id
     *     @type string $activity_id
     *     @type int $total_sku
     *     @type int $limit
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Coupon::initOnce();
        parent::__construct($data);
    }

    /**
     * 3
     *
     * Generated from protobuf field <code>int32 type = 1;</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 3
     *
     * Generated from protobuf field <code>int32 type = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkInt32($var);
        $this->type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 from_money = 2;</code>
     * @return int
     */
    public function getFromMoney()
    {
        return $this->from_money;
    }

    /**
     * Generated from protobuf field <code>int32 from_money = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setFromMoney($var)
    {
        GPBUtil::checkInt32($var);
        $this->from_money = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 to_money = 3;</code>
     * @return int
     */
    public function getToMoney()
    {
        return $this->to_money;
    }

    /**
     * Generated from protobuf field <code>int32 to_money = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setToMoney($var)
    {
        GPBUtil::checkInt32($var);
        $this->to_money = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string title = 4;</code>
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Generated from protobuf field <code>string title = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->title = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string company_id = 5;</code>
     * @return string
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * Generated from protobuf field <code>string company_id = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setCompanyId($var)
    {
        GPBUtil::checkString($var, True);
        $this->company_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string created_user_id = 6;</code>
     * @return string
     */
    public function getCreatedUserId()
    {
        return $this->created_user_id;
    }

    /**
     * Generated from protobuf field <code>string created_user_id = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setCreatedUserId($var)
    {
        GPBUtil::checkString($var, True);
        $this->created_user_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string activity_id = 7;</code>
     * @return string
     */
    public function getActivityId()
    {
        return $this->activity_id;
    }

    /**
     * Generated from protobuf field <code>string activity_id = 7;</code>
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
     * Generated from protobuf field <code>int32 total_sku = 8;</code>
     * @return int
     */
    public function getTotalSku()
    {
        return $this->total_sku;
    }

    /**
     * Generated from protobuf field <code>int32 total_sku = 8;</code>
     * @param int $var
     * @return $this
     */
    public function setTotalSku($var)
    {
        GPBUtil::checkInt32($var);
        $this->total_sku = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 limit = 9;</code>
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Generated from protobuf field <code>int32 limit = 9;</code>
     * @param int $var
     * @return $this
     */
    public function setLimit($var)
    {
        GPBUtil::checkInt32($var);
        $this->limit = $var;

        return $this;
    }

}

