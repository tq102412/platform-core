<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Protoc;

/**
 */
class MemberClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Protoc\GetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Get(\Protoc\GetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.Member/Get',
        $argument,
        ['\Protoc\MembersResult', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\GetByUnionIdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetByUnionId(\Protoc\GetByUnionIdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.Member/GetByUnionId',
        $argument,
        ['\Protoc\Members', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\GetByMemberUnionIds $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetListByUnionId(\Protoc\GetByMemberUnionIds $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.Member/GetListByUnionId',
        $argument,
        ['\Protoc\MembersResult', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\GetByAppIdAndOpenidRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function getByAppIdAndOpenid(\Protoc\GetByAppIdAndOpenidRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.Member/getByAppIdAndOpenid',
        $argument,
        ['\Protoc\Members', 'decode'],
        $metadata, $options);
    }

}
