<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: account.proto

namespace Account;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>account.account</code>
 */
class account extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string AccountId = 1;</code>
     */
    private $AccountId = '';
    /**
     * Generated from protobuf field <code>string Comment = 2;</code>
     */
    private $Comment = '';
    /**
     * Generated from protobuf field <code>string BillCode = 3;</code>
     */
    private $BillCode = '';
    /**
     * Generated from protobuf field <code>string BillType = 4;</code>
     */
    private $BillType = '';
    /**
     * Generated from protobuf field <code>string Action = 5;</code>
     */
    private $Action = '';
    /**
     * Generated from protobuf field <code>int32 ChangeBalance = 6;</code>
     */
    private $ChangeBalance = 0;
    /**
     * Generated from protobuf field <code>int32 NowBalance = 7;</code>
     */
    private $NowBalance = 0;
    /**
     * Generated from protobuf field <code>string CreatedShopId = 8;</code>
     */
    private $CreatedShopId = '';
    /**
     * Generated from protobuf field <code>string CreatedUserId = 9;</code>
     */
    private $CreatedUserId = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $AccountId
     *     @type string $Comment
     *     @type string $BillCode
     *     @type string $BillType
     *     @type string $Action
     *     @type int $ChangeBalance
     *     @type int $NowBalance
     *     @type string $CreatedShopId
     *     @type string $CreatedUserId
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Account::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string AccountId = 1;</code>
     * @return string
     */
    public function getAccountId()
    {
        return $this->AccountId;
    }

    /**
     * Generated from protobuf field <code>string AccountId = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setAccountId($var)
    {
        GPBUtil::checkString($var, True);
        $this->AccountId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Comment = 2;</code>
     * @return string
     */
    public function getComment()
    {
        return $this->Comment;
    }

    /**
     * Generated from protobuf field <code>string Comment = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setComment($var)
    {
        GPBUtil::checkString($var, True);
        $this->Comment = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string BillCode = 3;</code>
     * @return string
     */
    public function getBillCode()
    {
        return $this->BillCode;
    }

    /**
     * Generated from protobuf field <code>string BillCode = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setBillCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->BillCode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string BillType = 4;</code>
     * @return string
     */
    public function getBillType()
    {
        return $this->BillType;
    }

    /**
     * Generated from protobuf field <code>string BillType = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setBillType($var)
    {
        GPBUtil::checkString($var, True);
        $this->BillType = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Action = 5;</code>
     * @return string
     */
    public function getAction()
    {
        return $this->Action;
    }

    /**
     * Generated from protobuf field <code>string Action = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setAction($var)
    {
        GPBUtil::checkString($var, True);
        $this->Action = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 ChangeBalance = 6;</code>
     * @return int
     */
    public function getChangeBalance()
    {
        return $this->ChangeBalance;
    }

    /**
     * Generated from protobuf field <code>int32 ChangeBalance = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setChangeBalance($var)
    {
        GPBUtil::checkInt32($var);
        $this->ChangeBalance = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 NowBalance = 7;</code>
     * @return int
     */
    public function getNowBalance()
    {
        return $this->NowBalance;
    }

    /**
     * Generated from protobuf field <code>int32 NowBalance = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setNowBalance($var)
    {
        GPBUtil::checkInt32($var);
        $this->NowBalance = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string CreatedShopId = 8;</code>
     * @return string
     */
    public function getCreatedShopId()
    {
        return $this->CreatedShopId;
    }

    /**
     * Generated from protobuf field <code>string CreatedShopId = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setCreatedShopId($var)
    {
        GPBUtil::checkString($var, True);
        $this->CreatedShopId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string CreatedUserId = 9;</code>
     * @return string
     */
    public function getCreatedUserId()
    {
        return $this->CreatedUserId;
    }

    /**
     * Generated from protobuf field <code>string CreatedUserId = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setCreatedUserId($var)
    {
        GPBUtil::checkString($var, True);
        $this->CreatedUserId = $var;

        return $this;
    }

}

