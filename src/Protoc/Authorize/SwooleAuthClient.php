<?php


namespace Authorize;

use Hyperf\GrpcClient\BaseClient;

class SwooleAuthClient extends BaseClient{
    public function authBig(AuthBig $authBig) {
        return $this->simpleRequest(
            '/authorize.Authorize/authBig',
            $authBig,
            [IdToken::class, 'decode']
        );
    }
}