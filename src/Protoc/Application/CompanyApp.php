<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: application.proto

namespace Application;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>application.CompanyApp</code>
 */
class CompanyApp extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string company_id = 1;</code>
     */
    private $company_id = '';
    /**
     * Generated from protobuf field <code>int32 app_id = 2;</code>
     */
    private $app_id = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $company_id
     *     @type int $app_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Application::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string company_id = 1;</code>
     * @return string
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * Generated from protobuf field <code>string company_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCompanyId($var)
    {
        GPBUtil::checkString($var, True);
        $this->company_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 app_id = 2;</code>
     * @return int
     */
    public function getAppId()
    {
        return $this->app_id;
    }

    /**
     * Generated from protobuf field <code>int32 app_id = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setAppId($var)
    {
        GPBUtil::checkInt32($var);
        $this->app_id = $var;

        return $this;
    }

}

