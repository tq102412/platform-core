<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Protoc;

/**
 */
class CouponClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Protoc\DiscountMoneyRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetDiscountMoney(\Protoc\DiscountMoneyRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.Coupon/GetDiscountMoney',
        $argument,
        ['\Protoc\DiscountMoney', 'decode'],
        $metadata, $options);
    }

}
