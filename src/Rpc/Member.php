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
            'json' => $data,
        ]);
    }

    /**
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function addMemberUnion($data) {
        return self::getClient()->request('POST', '/api/member/union/add', [
            'json' => $data,
        ]);
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function checkoutRecharge($billCode, $data = []) {
        return self::getClient()->request('POST', "/api/rechargebill/checkout/$billCode", [
            'json' => $data,
        ]);
    }

    /**
     * 注意此接口不是内部专用
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function createRecharge($data = []) {
        return self::getClient()->request('POST', "/api/rechargebill/create", [
            'json' => $data,
        ]);
    }


    /**
     * @param $billCode
     * @param array $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function checkoutConsumeBill($billCode, $data = []) {
        return self::getClient()->request('POST', "/api/consumebill/checkout/$billCode", [
            'json' => $data,
        ]);
    }


    /**
     * 注意此接口不是内部专用
     *
     * @param $billCode
     * @param array $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function createQuick($data = []) {
        return self::getClient()->request('POST', "/api/consumebill/create", [
            'json' => $data,
        ]);
    }


    /**
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function createActive($data) {
        return self::getClient()->request('POST', "/api/member/active/create", [
            'json' => $data,
        ]);
    }


    /**
     * 通过union_id创建会员
     *
     * @param $unionId
     * @param $companyId
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function makeByUnionId($unionId, $companyId, $data) {
        return self::getClient()->request('POST', '/api/member/make', [
            'json' => [
                'data'       => $data,
                'unionid'    => $unionId,
                'company_id' => $companyId,
            ],
        ]);
    }

}