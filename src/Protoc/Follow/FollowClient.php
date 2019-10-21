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
     * @param \Follow\GetFollowIdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetFollowIdByUnionId(\Follow\GetFollowIdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Follow.Follow/GetFollowIdByUnionId',
        $argument,
        ['\Follow\FollowId', 'decode'],
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

    /**
     * @param \Follow\FollowIds $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetByFollowIds(\Follow\FollowIds $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Follow.Follow/GetByFollowIds',
        $argument,
        ['\Follow\FollowList', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Follow\FollowId $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetByFollowId(\Follow\FollowId $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Follow.Follow/GetByFollowId',
        $argument,
        ['\Follow\FollowInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Follow\FollowId $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetFollowUnionByFollowId(\Follow\FollowId $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Follow.Follow/GetFollowUnionByFollowId',
        $argument,
        ['\Follow\FollowUnion', 'decode'],
        $metadata, $options);
    }

}
