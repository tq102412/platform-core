<?php

namespace Ineplant\Rpc;

use GuzzleHttp\Exception\InvalidArgumentException;
use Ineplant\Exceptions\ReturnException;
use Ineplant\Helper;

class UserAccount {

    use BaseRpc;

    protected static $domain = 'http://ucenter:60004';

    /**
     * 变更商铺资金账户
     *
     * @return array
     * @throws ReturnException
     * @version ucenter: ~1.4.5
     *
     * @params array $request {
     * @type string created_user_id 用户id
     * @type string company_id 公司id
     * @type string comment 备注
     * @type string origin_id 来源id，对应来源类型的标识
     * @type string origin_type 来源类型：order，activity等,参照\Ineplant\Enum\UcenterAccountOriginType
     * @type int price
     * @type boolean auto_deduct_commission
     * }
     * @params string $xaId
     */
    public static function change($request = [], $xaId = '') {
        $request['xa'] = [
            'id' => $xaId,
        ];
        return Helper::responseForRPC(function () use ($request) {
            $response = self::getClient()->request('POST', '/account/change', [
                'json' => $request,
            ]);
            return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        }, '余额服务');
    }

    /**
     * 改变余额并处理事务
     *
     * @param $request
     * @param \Closure $handle
     * @throws ReturnException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function transaction($request, \Closure $handle) {
        $xaId = Helper::createOrderNo();
        self::change($request, $xaId);
        try {
            $handle();
            self::XaCommit($xaId);
        } catch (\Exception $e) {
            self::XaRollback($xaId);
            throw $e;
        }
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