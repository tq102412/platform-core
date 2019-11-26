<?php


namespace Application;


use Hyperf\GrpcClient\BaseClient;

class ApplicationClient extends BaseClient {
    public function appOrderNotify(Order $order) {
        return $this->simpleRequest(
            '/application.application/appOrderNotify',
            $order,
            [Result::class, 'decode']
        );
    }
}