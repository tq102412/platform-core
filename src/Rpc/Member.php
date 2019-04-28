<?php

namespace Ineplant\Rpc;

class Member {

    use BaseRpc;

    protected static $domain = 'http://member:60002';

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


}