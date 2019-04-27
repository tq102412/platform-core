<?php

namespace Ineplant\Rpc;

class UserCenter {

    use BaseRpc;

    protected static $domain = 'http://ucenter:60004';

    public static function findOrCreate($openid) {
        return self::getClient()->request('GET', '/user/find_or_create', [
            'query' => [
                'openid' => $openid
            ]
        ]);
    }

    public static function find($uniqueId) {
        return self::getClient()->request('GET', '/user/get', [
            'query' => [
                'unique_id' => $uniqueId
            ]
        ]);
    }

}