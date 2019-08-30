<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: account.proto

namespace Account;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>account.GetLogRequest</code>
 */
class GetLogRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string association = 1;</code>
     */
    private $association = '';
    /**
     * Generated from protobuf field <code>repeated int32 type = 2;</code>
     */
    private $type;
    /**
     * Generated from protobuf field <code>string from_date = 3;</code>
     */
    private $from_date = '';
    /**
     * Generated from protobuf field <code>string to_date = 4;</code>
     */
    private $to_date = '';
    /**
     * Generated from protobuf field <code>int32 offset = 5;</code>
     */
    private $offset = 0;
    /**
     * Generated from protobuf field <code>int32 limit = 6;</code>
     */
    private $limit = 0;
    /**
     * Generated from protobuf field <code>int32 query_balance = 7;</code>
     */
    private $query_balance = 0;
    /**
     * Generated from protobuf field <code>int32 change_balance = 8;</code>
     */
    private $change_balance = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $association
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $type
     *     @type string $from_date
     *     @type string $to_date
     *     @type int $offset
     *     @type int $limit
     *     @type int $query_balance
     *     @type int $change_balance
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Account::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string association = 1;</code>
     * @return string
     */
    public function getAssociation()
    {
        return $this->association;
    }

    /**
     * Generated from protobuf field <code>string association = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setAssociation($var)
    {
        GPBUtil::checkString($var, True);
        $this->association = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated int32 type = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Generated from protobuf field <code>repeated int32 type = 2;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setType($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->type = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string from_date = 3;</code>
     * @return string
     */
    public function getFromDate()
    {
        return $this->from_date;
    }

    /**
     * Generated from protobuf field <code>string from_date = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setFromDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->from_date = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string to_date = 4;</code>
     * @return string
     */
    public function getToDate()
    {
        return $this->to_date;
    }

    /**
     * Generated from protobuf field <code>string to_date = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setToDate($var)
    {
        GPBUtil::checkString($var, True);
        $this->to_date = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 offset = 5;</code>
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Generated from protobuf field <code>int32 offset = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setOffset($var)
    {
        GPBUtil::checkInt32($var);
        $this->offset = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 limit = 6;</code>
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Generated from protobuf field <code>int32 limit = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setLimit($var)
    {
        GPBUtil::checkInt32($var);
        $this->limit = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 query_balance = 7;</code>
     * @return int
     */
    public function getQueryBalance()
    {
        return $this->query_balance;
    }

    /**
     * Generated from protobuf field <code>int32 query_balance = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setQueryBalance($var)
    {
        GPBUtil::checkInt32($var);
        $this->query_balance = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 change_balance = 8;</code>
     * @return int
     */
    public function getChangeBalance()
    {
        return $this->change_balance;
    }

    /**
     * Generated from protobuf field <code>int32 change_balance = 8;</code>
     * @param int $var
     * @return $this
     */
    public function setChangeBalance($var)
    {
        GPBUtil::checkInt32($var);
        $this->change_balance = $var;

        return $this;
    }

}
