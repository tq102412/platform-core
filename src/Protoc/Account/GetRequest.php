<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: account.proto

namespace Account;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>account.GetRequest</code>
 */
class GetRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .account.Associations associations = 1;</code>
     */
    private $associations;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Account\Associations[]|\Google\Protobuf\Internal\RepeatedField $associations
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Account::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .account.Associations associations = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAssociations()
    {
        return $this->associations;
    }

    /**
     * Generated from protobuf field <code>repeated .account.Associations associations = 1;</code>
     * @param \Account\Associations[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAssociations($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Account\Associations::class);
        $this->associations = $arr;

        return $this;
    }

}
