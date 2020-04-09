<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: follow.proto

namespace Follow;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Follow.FollowData</code>
 */
class FollowData extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string nickname = 1;</code>
     */
    protected $nickname = '';
    /**
     * Generated from protobuf field <code>string avatar_url = 2;</code>
     */
    protected $avatar_url = '';
    /**
     * Generated from protobuf field <code>int32 gender = 3;</code>
     */
    protected $gender = 0;
    /**
     * Generated from protobuf field <code>string country = 4;</code>
     */
    protected $country = '';
    /**
     * Generated from protobuf field <code>string province = 5;</code>
     */
    protected $province = '';
    /**
     * Generated from protobuf field <code>string city = 6;</code>
     */
    protected $city = '';
    /**
     * Generated from protobuf field <code>string language = 7;</code>
     */
    protected $language = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $nickname
     *     @type string $avatar_url
     *     @type int $gender
     *     @type string $country
     *     @type string $province
     *     @type string $city
     *     @type string $language
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Follow::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string nickname = 1;</code>
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Generated from protobuf field <code>string nickname = 1;</code>
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
     * Generated from protobuf field <code>string avatar_url = 2;</code>
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatar_url;
    }

    /**
     * Generated from protobuf field <code>string avatar_url = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setAvatarUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->avatar_url = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 gender = 3;</code>
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Generated from protobuf field <code>int32 gender = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setGender($var)
    {
        GPBUtil::checkInt32($var);
        $this->gender = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string country = 4;</code>
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Generated from protobuf field <code>string country = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setCountry($var)
    {
        GPBUtil::checkString($var, True);
        $this->country = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string province = 5;</code>
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Generated from protobuf field <code>string province = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setProvince($var)
    {
        GPBUtil::checkString($var, True);
        $this->province = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string city = 6;</code>
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Generated from protobuf field <code>string city = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setCity($var)
    {
        GPBUtil::checkString($var, True);
        $this->city = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string language = 7;</code>
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Generated from protobuf field <code>string language = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setLanguage($var)
    {
        GPBUtil::checkString($var, True);
        $this->language = $var;

        return $this;
    }

}

