<?php

namespace Ineplant\Rpc;

use Authorize\AuthBig;
use Authorize\SwooleAuthClient;

class SwooleGrpcAuth {

    protected static function getClient() {
        return new SwooleAuthClient(self::getServAddName(), [
            'credentials' => null,
        ]);
    }

    protected static function getServAddName(): string {
        return "authorize:8080";
    }


    /**
     * @param int $uid
     * @return mixed
     */
    public static function authBig(int $uid) {
        $client = self::getClient();
        $request = new AuthBig();
        $request->setUid($uid);

        return $client->authBig($request);
    }


}