<?php

namespace Ineplant\Rpc;

class UserCenter {

    use BaseRpc;

    protected static $domain = 'http://ucenter:60004';

    /**
     * @param $openid
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function findOrCreate($followId, $data = []) {
        return self::getClient()->request('POST', '/user/find_or_create', [
            'query' => [
                'follow_id' => $followId,
            ],
            'json'  => $data,
        ]);
    }

    /**
     * @param $uniqueId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function find($uniqueId) {
        return self::getClient()->request('GET', '/user/get', [
            'query' => [
                'unique_id' => $uniqueId,
            ],
        ]);
    }

    /**
     * @param $uniqueId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function update($uniqueId, $userInfo) {
        return self::getClient()->request('POST', "/user/update?unique_id=$uniqueId", [
            'json' => $userInfo,
        ]);
    }

}