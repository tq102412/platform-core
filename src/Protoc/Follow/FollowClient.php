<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Follow;

/**
 */
class FollowClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Follow\GetFollowRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetFollow(\Follow\GetFollowRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Follow.Follow/GetFollow',
        $argument,
        ['\Follow\FollowInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Follow\GetByOpenidAndAppIdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetByOpenidAndAppId(\Follow\GetByOpenidAndAppIdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Follow.Follow/GetByOpenidAndAppId',
        $argument,
        ['\Follow\FollowInfo', 'decode'],
        $metadata, $options);
    }

}
