<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Appserv;

/**
 */
class AppServClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Appserv\ChangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Consuming(\Appserv\ChangeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/appserv.AppServ/Consuming',
        $argument,
        ['\Appserv\DefaultResp', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Appserv\ChangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Add(\Appserv\ChangeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/appserv.AppServ/Add',
        $argument,
        ['\Appserv\DefaultResp', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Appserv\XaRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function XaCommit(\Appserv\XaRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/appserv.AppServ/XaCommit',
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
        return $this->_simpleRequest('/appserv.AppServ/XaRollback',
        $argument,
        ['\Appserv\PBEmpty', 'decode'],
        $metadata, $options);
    }

}
