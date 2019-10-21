<?php

namespace Ineplant\Rpc;

use Ineplant\Helper;

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

    /**
     * @param $followId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getByFollowId($followId) {
        return self::getClient()->request('GET', '/user/get_by_follow', [
            'query' => [
                'follow_id' => $followId,
            ],
        ]);
    }

    /**
     * @param $title
     * @return array|\ArrayAccess|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function getCompanyIds($title, $companyIds = []) {
        $response = self::getClient()->request('POST', '/company/get_all', [
            'json' => [
                'title' => $title,
            ],
        ]);

        return array_column(Helper::getForJsonResponse($response, 'content.data'), null, 'CompanyId');
    }

}