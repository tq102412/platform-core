<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: account.proto

namespace Account;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>account.AccountLogs</code>
 */
class AccountLogs extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .account.AccountLog accountLog = 1;</code>
     */
    private $accountLog;
    /**
     * Generated from protobuf field <code>int64 total = 2;</code>
     */
    private $total = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Account\AccountLog[]|\Google\Protobuf\Internal\RepeatedField $accountLog
     *     @type int|string $total
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Account::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .account.AccountLog accountLog = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAccountLog()
    {
        return $this->accountLog;
    }

    /**
     * Generated from protobuf field <code>repeated .account.AccountLog accountLog = 1;</code>
     * @param \Account\AccountLog[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAccountLog($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Account\AccountLog::class);
        $this->accountLog = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 total = 2;</code>
     * @return int|string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Generated from protobuf field <code>int64 total = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTotal($var)
    {
        GPBUtil::checkInt64($var);
        $this->total = $var;

        return $this;
    }

}
