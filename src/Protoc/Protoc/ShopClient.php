<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Protoc;

/**
 */
class ShopClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Protoc\GetShopsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetByShopIds(\Protoc\GetShopsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.Shop/GetByShopIds',
        $argument,
        ['\Protoc\ShopsResult', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\GetShopRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetShop(\Protoc\GetShopRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.Shop/GetShop',
        $argument,
        ['\Protoc\Shops', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Protoc\ShopRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateDefaultShop(\Protoc\ShopRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/protoc.Shop/CreateDefaultShop',
        $argument,
        ['\Protoc\Shops', 'decode'],
        $metadata, $options);
    }

}
