<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Protoc;

/**
 */
class scoreClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Protoc\ChangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Change(\Protoc\ChangeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.score/Change',
        $argument,
        ['\Protoc\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\GetMasterByMemberRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetMasterByMember(\Protoc\GetMasterByMemberRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.score/GetMasterByMember',
        $argument,
        ['\Protoc\MasterAccount', 'decode'],
        $metadata, $options);
    }

}
