<?php

namespace Ineplant\Rpc;

use Authorize\AuthBig;
use Authorize\SwooleAuthClient;

class SwooleGrpcAuth extends GrpcHyperClient {

    protected static function getServAddName(): string {
        return "authorize:8080";
    }

    protected static function getClientName() {
        return SwooleAuthClient::class;
    }

    /**
     * @param int $uid
     * @return mixed
     */
    public static function authBig(int $uid) {
        $client  = self::getClient();
        $request = new AuthBig();
        $request->setUid($uid);

        return $client->authBig($request);
    }

}