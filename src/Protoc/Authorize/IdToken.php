<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: authorize.proto

namespace Authorize;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>authorize.IdToken</code>
 */
class IdToken extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string idToken = 1;</code>
     */
    private $idToken = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $idToken
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Authorize::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string idToken = 1;</code>
     * @return string
     */
    public function getIdToken()
    {
        return $this->idToken;
    }

    /**
     * Generated from protobuf field <code>string idToken = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setIdToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->idToken = $var;

        return $this;
    }

}
