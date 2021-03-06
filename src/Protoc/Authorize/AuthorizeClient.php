<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Authorize;

/**
 */
class AuthorizeClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Authorize\AuthInfo $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function auth(\Authorize\AuthInfo $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/authorize.Authorize/auth',
        $argument,
        ['\Authorize\IdToken', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Authorize\AuthFollow $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function authFollow(\Authorize\AuthFollow $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/authorize.Authorize/authFollow',
        $argument,
        ['\Authorize\IdToken', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Authorize\AuthBig $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function authBig(\Authorize\AuthBig $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/authorize.Authorize/authBig',
        $argument,
        ['\Authorize\IdToken', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Authorize\AuthComponent $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function authComponent(\Authorize\AuthComponent $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/authorize.Authorize/authComponent',
        $argument,
        ['\Authorize\IdToken', 'decode'],
        $metadata, $options);
    }

}
