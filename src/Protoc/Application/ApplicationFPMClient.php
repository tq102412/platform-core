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
        return $this->_simpleRequest('/application.application/appOrderNotify',
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
        return $this->_simpleRequest('/application.application/autoPurchase',
            $argument,
            [Result::class, 'decode'],
            $metadata, $options);
    }

    /**
     * @param CompanyApp $argument
     * @param array $metadata
     * @param array $options
     * @return \Grpc\UnaryCall
     */
    public function paidApps(CompanyApp $argument,
                                 $metadata = [], $options = []) {
        return $this->_simpleRequest('/application.application/paidApps',
            $argument,
            [Apps::class, 'decode'],
            $metadata, $options);
    }

    /**
     * @param PayOrder $argument
     * @param array $metadata
     * @param array $options
     * @return \Grpc\UnaryCall
     */
    public function getOrder(PayOrder $argument,
                             $metadata = [], $options = []) {
        return $this->_simpleRequest('/application.application/getOrder',
            $argument,
            [PayOrder::class, 'decode'],
            $metadata, $options);
    }

    /**
     * @param PayOrder $argument
     * @param array $metadata
     * @param array $options
     * @return \Grpc\UnaryCall
     */
    public function saveOrder(PayOrder $argument,
                             $metadata = [], $options = []) {
        return $this->_simpleRequest('/application.application/saveOrder',
            $argument,
            [Result::class, 'decode'],
            $metadata, $options);
    }

    /**
     * @param PayOrder $argument
     * @param array $metadata
     * @param array $options
     * @return \Grpc\UnaryCall
     */
    public function refund(PayOrder $argument,
                              $metadata = [], $options = []) {
        return $this->_simpleRequest('/application.application/refund',
            $argument,
            [Result::class, 'decode'],
            $metadata, $options);
    }
}