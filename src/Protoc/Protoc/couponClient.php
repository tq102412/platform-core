<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Protoc;

/**
 */
class couponClient extends \Grpc\BaseStub {

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
        return $this->_simpleRequest('/protoc.coupon/GetDiscountMoney',
        $argument,
        ['\Protoc\DiscountMoney', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\ConsumingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Consuming(\Protoc\ConsumingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.coupon/Consuming',
        $argument,
        ['\Protoc\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\ReceivingRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Receiving(\Protoc\ReceivingRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.coupon/Receiving',
        $argument,
        ['\Protoc\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\GetByIdsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetByIds(\Protoc\GetByIdsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.coupon/GetByIds',
        $argument,
        ['\Protoc\Coupons', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\GetByCodesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetByCodes(\Protoc\GetByCodesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.coupon/GetByCodes',
        $argument,
        ['\Protoc\MemberCoupons', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\GetCountByMemberRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetCountByMember(\Protoc\GetCountByMemberRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.coupon/GetCountByMember',
        $argument,
        ['\Protoc\Count', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\CouponCreateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateCoupon(\Protoc\CouponCreateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.coupon/CreateCoupon',
        $argument,
        ['\Protoc\Coupon', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\CancelRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Cancel(\Protoc\CancelRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.coupon/Cancel',
        $argument,
        ['\Protoc\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\RecoverRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Recover(\Protoc\RecoverRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.coupon/Recover',
        $argument,
        ['\Protoc\PBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\CancelSourceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CancelBySourceId(\Protoc\CancelSourceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.coupon/CancelBySourceId',
        $argument,
        ['\Protoc\PBEmpty', 'decode'],
        $metadata, $options);
    }

}
