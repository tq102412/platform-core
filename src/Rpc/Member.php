<?php

namespace Ineplant\Rpc;

use Ineplant\Enum\ErrorCode;
use Ineplant\Exceptions\ErrCodeException;
use Ineplant\Helper;

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
        return self::getClient()->request('POST', '/api/member/makebyunionId', [
            'json' => [
                'data'       => $data,
                'unionid'    => $unionId,
                'company_id' => $companyId,
            ],
        ]);
    }


    /**
     * 查询或者创建一个会员信息
     *
     * @param $companyId
     * @param $followId
     * @param array $memberData
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function findOrCreate($companyId, $followId, $memberData = []) {
        return self::getClient()->request('POST', '/api/member/find_or_create', [
            'json' => [
                'companyId' => $companyId,
                'followId'  => $followId,
                'data'      => $memberData
            ],
        ]);
    }


    /**
     * 查询会员所有数据
     *
     * @param array $query {
     * @type string nickname 昵称
     * @type string code 会员卡号
     * @type string mobile 电话号码
     * @type string grade_id 等级id
     * @type string gender 性别 1男 2女 0所有（默认）
     * @type string birthday_from 生日开始时间
     * @type string birthday_to 生日结束时间
     * }
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getAll($query = []) {
        return self::getClient()->request('POST', '/api/member/getall', [
            'json' => $query,
        ]);
    }

    /**
     * member_id 获取会员信息
     *
     * @param $memberId
     * @return array|\ArrayAccess|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function info($memberId) {
        $response = self::getClient()->request('GET', '/api/member/info', [
            'query' => ['id' => $memberId],
        ]);

        $result = Helper::getForJsonResponse($response);
        if (empty($result['union_id'])) {
            throw new ErrCodeException(ErrorCode::MODEL_NOT_FOUND);
        }
        return $result;
    }


    /**
     * @param $transactionId
     * @return array|\ArrayAccess|mixed
     * @throws ErrCodeException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function getByTransactionId($transactionId) {
        $response = self::getClient()->request('GET', '/api/consumepayway/getbytransactionid/' . $transactionId);

        return Helper::getForJsonResponse($response);
    }

}