<?php

namespace Ineplant\Rpc;

class WechatStore extends WechatBasic {

    /**
     * @param $appId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function districts($appId) {
        return self::getClient()->request('GET', "/api/store/districts", [
            'query' => [
                'appId' => $appId
            ]
        ]);
    }

    /**
     * @param $appId
     * @param $districtId
     * @param $keyword
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function search($appId, $districtId, $keyword) {
        return self::getClient()->request('POST', "/api/store/search", [
            'json' => [
                'appId'      => $appId,
                'districtId' => $districtId,
                'keyword'    => $keyword,
            ]
        ]);
    }

    /**
     * @param $appId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function categories($appId) {
        return self::getClient()->request('GET', "/api/store/categories", [
            'json' => [
                'appId'      => $appId,
            ]
        ]);
    }

    /**
     * @param $appId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function list($appId, int $offset = 0, int $limit = 20) {
        return self::getClient()->request('GET', "/api/store/list", [
            'json' => [
                'appId'  => $appId,
                'offset' => $offset,
                'limit'  => $limit,
            ]
        ]);
    }



}