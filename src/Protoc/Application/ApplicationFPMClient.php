<?php


namespace Application;


class ApplicationFPMClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Member\GetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function appOrderNotify(Order $argument,
                                   $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc/orderNotify',
            $argument,
            [Result::class, 'decode'],
            $metadata, $options);
    }

    /**
     * @param PurchaseInfo $argument
     * @param array $metadata
     * @param array $options
     * @return \Grpc\UnaryCall
     */
    public function autoPurchase(PurchaseInfo $argument,
                                 $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc/autoPurchase',
            $argument,
            [Result::class, 'decode'],
            $metadata, $options);
    }
}