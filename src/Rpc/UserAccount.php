<?php

namespace Ineplant\Rpc;


class UserAccount {

    use BaseRpc;

    protected static $domain = 'http://ucenter:60004';

    /**
     * @param array $request {
     * @type string user_id
     * @type string company_id
     * @type string comment
     * @type string action
     * @type string origin_id
     * @type string origin_type
     * @type int price
     * }
     * @param string $xaId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function change($request = [], $xaId = '') {
        $request['xa'] = [
            'id' => $xaId,
        ];

        return self::getClient()->request('POST', '/xacommit', [
            'json' => $request,
        ]);
    }


    /**
     * @param $userId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function get($userId) {
        return self::getClient()->request('GET', '/account/get', [
            'query' => [
                'user_id' => $userId,
            ],
        ]);
    }


    /**
     * @param string $xaId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function XaCommit($xaId = "") {
        return self::getClient()->request('POST', '/xacommit', [
            'json' => [
                'id' => $xaId,
            ],
        ]);
    }


    /**
     * @param string $xaId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function XaRollback($xaId = "") {
        return self::getClient()->request('POST', '/xarollback', [
            'json' => [
                'id' => $xaId,
            ],
        ]);
    }
}