<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Account;

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
     * @param \Account\ChangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Change(\Account\ChangeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/account.Account/Change',
        $argument,
        ['\Account\AccountInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Account\GetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Get(\Account\GetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/account.Account/Get',
        $argument,
        ['\Account\ResultAccount', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Account\Associations $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetOne(\Account\Associations $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/account.Account/GetOne',
        $argument,
        ['\Account\AccountInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Account\CancelRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Cancel(\Account\CancelRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/account.Account/Cancel',
        $argument,
        ['\Account\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Account\XaRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function XaCommit(\Account\XaRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/account.Account/XaCommit',
        $argument,
        ['\Account\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Account\XaRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function XaRollback(\Account\XaRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/account.Account/XaRollback',
        $argument,
        ['\Account\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Account\CreatesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Create(\Account\CreatesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/account.Account/Create',
        $argument,
        ['\Account\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Account\GetLogRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetLog(\Account\GetLogRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/account.Account/GetLog',
        $argument,
        ['\Account\AccountLogs', 'decode'],
        $metadata, $options);
    }

}
