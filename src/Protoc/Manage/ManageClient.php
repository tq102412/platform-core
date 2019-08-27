<?php


namespace Manage;


use Hyperf\GrpcClient\BaseClient;

class ManageClient extends BaseClient {
    public function sayHello(HiUser $argument)
    {
        return $this->simpleRequest(
            '/test/sayHello',
            $argument,
            [HiReply::class, 'decode']
        );
    }
}