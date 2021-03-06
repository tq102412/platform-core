<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: account.proto

namespace Account;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>account.CreateRequest</code>
 */
class CreateRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 Balance = 1;</code>
     */
    private $Balance = 0;
    /**
     * Generated from protobuf field <code>int32 MaxBalance = 2;</code>
     */
    private $MaxBalance = 0;
    /**
     * Generated from protobuf field <code>int32 FixedBalance = 3;</code>
     */
    private $FixedBalance = 0;
    /**
     * Generated from protobuf field <code>int32 Type = 4;</code>
     */
    private $Type = 0;
    /**
     * Generated from protobuf field <code>string Association = 5;</code>
     */
    private $Association = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $Balance
     *     @type int $MaxBalance
     *     @type int $FixedBalance
     *     @type int $Type
     *     @type string $Association
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Account::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 Balance = 1;</code>
     * @return int
     */
    public function getBalance()
    {
        return $this->Balance;
    }

    /**
     * Generated from protobuf field <code>int32 Balance = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setBalance($var)
    {
        GPBUtil::checkInt32($var);
        $this->Balance = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 MaxBalance = 2;</code>
     * @return int
     */
    public function getMaxBalance()
    {
        return $this->MaxBalance;
    }

    /**
     * Generated from protobuf field <code>int32 MaxBalance = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setMaxBalance($var)
    {
        GPBUtil::checkInt32($var);
        $this->MaxBalance = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 FixedBalance = 3;</code>
     * @return int
     */
    public function getFixedBalance()
    {
        return $this->FixedBalance;
    }

    /**
     * Generated from protobuf field <code>int32 FixedBalance = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setFixedBalance($var)
    {
        GPBUtil::checkInt32($var);
        $this->FixedBalance = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 Type = 4;</code>
     * @return int
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Generated from protobuf field <code>int32 Type = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkInt32($var);
        $this->Type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string Association = 5;</code>
     * @return string
     */
    public function getAssociation()
    {
        return $this->Association;
    }

    /**
     * Generated from protobuf field <code>string Association = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setAssociation($var)
    {
        GPBUtil::checkString($var, True);
        $this->Association = $var;

        return $this;
    }

}

