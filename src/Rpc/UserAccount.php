<?php

namespace Ineplant\Rpc;

use GuzzleHttp\Exception\InvalidArgumentException;

class UserAccount {

    use BaseRpc;

    protected static $domain = 'http://ucenter:60004';

    /**
     * 变更商铺资金账户
     *
     * @version ucenter: ~1.4.5
     *
     * @param array $request {
     * @type string user_id 用户id
     * @type string company_id 公司id
     * @type string comment 备注
     * @type string origin_id 来源id，对应来源类型的标识
     * @type string origin_type 来源类型：order，activity等,参照\Ineplant\Enum\UcenterAccountOriginType
     * @type int price
     * }
     * @param string $xaId
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException|InvalidArgumentException
     */
    public static function change($request = [], $xaId = '') {
        $request['xa'] = [
            'id' => $xaId,
        ];

        $response = self::getClient()->request('POST', '/account/change', [
            'json' => $request,
        ]);

        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }


    /**
     * @param $companyId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException|InvalidArgumentException
     */
    public static function get($companyId) {
        $response = self::getClient()->request('GET', '/account/get', [
            'query' => [
                'company_id' => $companyId,
            ],
        ]);

        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }


    /**
     * @param string $xaId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function XaCommit($xaId = "") {
        $response = self::getClient()->request('POST', '/xacommit', [
            'json' => [
                'id' => $xaId,
            ],
        ]);

        return $response->getBody()->getContents();
    }


    /**
     * @param string $xaId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function XaRollback($xaId = "") {
        $response = self::getClient()->request('POST', '/xarollback', [
            'json' => [
                'id' => $xaId,
            ],
        ]);

        return $response->getBody()->getContents();
    }
}