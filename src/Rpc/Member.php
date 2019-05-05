<?php

namespace Ineplant\Rpc;

class Member {

    use BaseRpc;

    protected static $domain = 'http://member';

    /**
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function make($data) {
        return self::getClient()->request('POST', '/api/member/make', [
            'json' => $data
        ]);
    }

    /**
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function addMemberUnion($data) {
        return self::getClient()->request('POST', '/api/member/union/add', [
            'json' => $data
        ]);
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function checkoutRecharge($billCode, $data = []) {
        return self::getClient()->request('POST', "/api/rechargebill/checkout/$billCode", [
            'json' => $data
        ]);
    }

}