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
     * @param $companyId
     * @return array|\ArrayAccess|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function getCompanyById($companyId) {
        $response = self::getClient()->request('POST', '/company/get_by_companyids', [
            'json' => [
                'companyIds' => [$companyId],
            ],
        ]);

        $companyArr = Helper::getForJsonResponse($response);
        return reset($companyArr);
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
     * 服务端签名，需要服务ucenter:1.3以上版本
     *
     * @param string $clientId 端的id
     * @param $query
     * @param array $body
     * @response array {
     * @type string nonce_str
     * @type int timestamp
     * @type string sign_str
     * }
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sign($clientId, $query, $body = []) {
        $query['body'] = \GuzzleHttp\json_encode($body);
        return self::getClient()->request('POST', '/sign', [
            'query' => [
                'client_id' => $clientId,
            ],
            'json'  => $query,
        ]);
    }

    /**
     * 获取第三方other id 需要服务ucenter:1.3以上版本
     *
     *
     * @param string $clientId 客户端id
     * @param string $companyId 公司id
     * @return string $other_id
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getOtherId($clientId, $companyId) {
        $response = self::getClient()->request('POST', '/getotherid', [
            'query' => [
                'client_id'  => $clientId,
                'company_id' => $companyId,
            ],
        ]);

        return $response->getBody()->getContents();
    }

    /**
     * @param $userId
     * @param $companyId
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function auth($userId, $companyId) {
        $response = self::getClient()->request('POST', '/user/auth', [
            'json' => [
                'user_id'    => $userId,
                'company_id' => $companyId,
            ],
        ]);

        return $response->getBody()->getContents();
    }


    /**
     * @param $companyId
     * @return mixed
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function getClientId($companyId) {
        return Helper::responseForRPC(function() use ($companyId) {
            $response = self::getClient()->request('GET', '/getclientid', [
                'query' => [
                    'company_id' => $companyId,
                ],
            ]);

            return $response->getBody()->getContents();
        }, "CLIENT ID GETTING");
    }
}