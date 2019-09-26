<?php

namespace Ineplant\Rpc;

class WechatBasic {

    use BaseRpc;


    protected static $domain = 'http://wechat';


    /**
     *
     * 小程序登录接口
     *
     * @param $appId
     * @param $code
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function session($appId, $code) {
        return self::getClient()->request('POST', "/api/wxa/auth/session", [
            'json' => [
                'appId' => $appId,
                'code' => $code,
            ]
        ]);
    }

    /**
     * 获取公众号信息
     *
     * @param $companyId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getByCompanyId($companyId) {
        return self::getClient()->request('GET', "/api/wechat/getbycompanyid/$companyId");
    }

}