<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: appserv.proto

namespace Appserv;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>appserv.XaRequest</code>
 */
class XaRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string xa_id = 1;</code>
     */
    private $xa_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $xa_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Appserv::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string xa_id = 1;</code>
     * @return string
     */
    public function getXaId()
    {
        return $this->xa_id;
    }

    /**
     * Generated from protobuf field <code>string xa_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setXaId($var)
    {
        GPBUtil::checkString($var, True);
        $this->xa_id = $var;

        return $this;
    }

}
