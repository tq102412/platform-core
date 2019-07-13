<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: member.proto

namespace Protoc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protoc.Members</code>
 */
class Members extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 id = 1;</code>
     */
    private $id = 0;
    /**
     * Generated from protobuf field <code>string nickname = 2;</code>
     */
    private $nickname = '';
    /**
     * Generated from protobuf field <code>string openid = 3;</code>
     */
    private $openid = '';
    /**
     * Generated from protobuf field <code>string union_id = 4;</code>
     */
    private $union_id = '';
    /**
     * Generated from protobuf field <code>string headimgurl = 5;</code>
     */
    private $headimgurl = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $id
     *     @type string $nickname
     *     @type string $openid
     *     @type string $union_id
     *     @type string $headimgurl
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Member::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint32 id = 1;</code>
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Generated from protobuf field <code>uint32 id = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkUint32($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string nickname = 2;</code>
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Generated from protobuf field <code>string nickname = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNickname($var)
    {
        GPBUtil::checkString($var, True);
        $this->nickname = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string openid = 3;</code>
     * @return string
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * Generated from protobuf field <code>string openid = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setOpenid($var)
    {
        GPBUtil::checkString($var, True);
        $this->openid = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string union_id = 4;</code>
     * @return string
     */
    public function getUnionId()
    {
        return $this->union_id;
    }

    /**
     * Generated from protobuf field <code>string union_id = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setUnionId($var)
    {
        GPBUtil::checkString($var, True);
        $this->union_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string headimgurl = 5;</code>
     * @return string
     */
    public function getHeadimgurl()
    {
        return $this->headimgurl;
    }

    /**
     * Generated from protobuf field <code>string headimgurl = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setHeadimgurl($var)
    {
        GPBUtil::checkString($var, True);
        $this->headimgurl = $var;

        return $this;
    }

}

