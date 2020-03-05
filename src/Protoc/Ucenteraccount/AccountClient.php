<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Ucenteraccount;

/**
 */
class AccountClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Ucenteraccount\ChangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Change(\Ucenteraccount\ChangeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ucenteraccount.Account/Change',
        $argument,
        ['\Ucenteraccount\AccountInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Ucenteraccount\GetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Get(\Ucenteraccount\GetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ucenteraccount.Account/Get',
        $argument,
        ['\Ucenteraccount\AccountInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Ucenteraccount\Xa $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function XaCommit(\Ucenteraccount\Xa $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ucenteraccount.Account/XaCommit',
        $argument,
        ['\Ucenteraccount\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Ucenteraccount\Xa $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function XaRollback(\Ucenteraccount\Xa $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/ucenteraccount.Account/XaRollback',
        $argument,
        ['\Ucenteraccount\PBEmpty', 'decode'],
        $metadata, $options);
    }

}
