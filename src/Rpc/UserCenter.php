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
     * 根据company name查询
     *
     * @param $title
     * @return array|\ArrayAccess|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function getCompanyByTitle($title) {
        $response = self::getClient()->request('POST', '/company/get_all', [
            'json' => [
                'title' => $title,
            ],
        ]);

        return array_column(Helper::getForJsonResponse($response, 'content.data'), null, 'CompanyId');
    }

    /**
     * 根据companyIds查询
     *
     * @param $companyIds
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function getCompanyByIds($companyIds) {
        $response = self::getClient()->request('POST', '/company/get_by_companyids', [
            'json' => [
                'companyIds' => $companyIds,
            ],
        ]);

        return array_column(Helper::getForJsonResponse($response), null, 'CompanyId');
    }

    /**
     * @param string $companyId
     * @return integer
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function shareTotal(string $companyId): int {
        $response = self::getClient()->request('GET', '/company/share_total', [
            'query' => [
                'company_id' => $companyId,
            ],
        ]);

        return intval($response->getBody()->getContents());
    }

    /**
     * @param string $clientId 端的id
     * @param string $body 默认要签名的body字符串
     * @param array $data 要签名的额外数据
     * @response array {
     * @type int s
     * }
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sign($clientId, $body = '', $data = []) {
        $data['body'] = $body;

        $response = self::getClient()->request('POST', '/sign', [
            'query' => [
                'client_id' => $clientId,
            ],
            'json'  => $data,
        ]);

        return $response->getBody()->getContents();
    }


}