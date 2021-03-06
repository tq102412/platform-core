<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: authorize.proto

namespace Authorize;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>authorize.AuthInfo</code>
 */
class AuthInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * 所属公司
     *
     * Generated from protobuf field <code>string companyId = 1;</code>
     */
    private $companyId = '';
    /**
     * 用户标识
     *
     * Generated from protobuf field <code>string userId = 2;</code>
     */
    private $userId = '';
    /**
     * 粉丝id
     *
     * Generated from protobuf field <code>string followId = 3;</code>
     */
    private $followId = '';
    /**
     * clientId
     *
     * Generated from protobuf field <code>string clientId = 4;</code>
     */
    private $clientId = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $companyId
     *           所属公司
     *     @type string $userId
     *           用户标识
     *     @type string $followId
     *           粉丝id
     *     @type string $clientId
     *           clientId
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Authorize::initOnce();
        parent::__construct($data);
    }

    /**
     * 所属公司
     *
     * Generated from protobuf field <code>string companyId = 1;</code>
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * 所属公司
     *
     * Generated from protobuf field <code>string companyId = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCompanyId($var)
    {
        GPBUtil::checkString($var, True);
        $this->companyId = $var;

        return $this;
    }

    /**
     * 用户标识
     *
     * Generated from protobuf field <code>string userId = 2;</code>
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * 用户标识
     *
     * Generated from protobuf field <code>string userId = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setUserId($var)
    {
        GPBUtil::checkString($var, True);
        $this->userId = $var;

        return $this;
    }

    /**
     * 粉丝id
     *
     * Generated from protobuf field <code>string followId = 3;</code>
     * @return string
     */
    public function getFollowId()
    {
        return $this->followId;
    }

    /**
     * 粉丝id
     *
     * Generated from protobuf field <code>string followId = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setFollowId($var)
    {
        GPBUtil::checkString($var, True);
        $this->followId = $var;

        return $this;
    }

    /**
     * clientId
     *
     * Generated from protobuf field <code>string clientId = 4;</code>
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * clientId
     *
     * Generated from protobuf field <code>string clientId = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setClientId($var)
    {
        GPBUtil::checkString($var, True);
        $this->clientId = $var;

        return $this;
    }

}

