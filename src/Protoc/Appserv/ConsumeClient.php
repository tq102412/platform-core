<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Appserv;

/**
 */
class ConsumeClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Appserv\ConsumingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Consuming(\Appserv\ConsumingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/appserv.Consume/Consuming',
        $argument,
        ['\Appserv\ConsumingResp', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Appserv\XaRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function XaCommit(\Appserv\XaRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/appserv.Consume/XaCommit',
        $argument,
        ['\Appserv\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Appserv\XaRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function XaRollback(\Appserv\XaRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/appserv.Consume/XaRollback',
        $argument,
        ['\Appserv\PBEmpty', 'decode'],
        $metadata, $options);
    }

}
