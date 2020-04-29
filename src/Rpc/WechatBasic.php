<?php

namespace Ineplant\Rpc;

use Ineplant\Exceptions\ErrCodeException;
use Ineplant\Helper;
use Ineplant\Enum\ErrorCode;

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
                'code'  => $code,
            ],
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


    /**
     * 订阅事件
     *
     * @param $companyId
     * @param array $eventIds
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function subscribe($companyId, array $eventIds) {
        return self::getClient()->request('POST', "/api/wechat/subscribe", [
            'json' => [
                'company_id' => $companyId,
                'event_ids'  => $eventIds,
            ],
        ]);
    }


    /**
     * 文本反垃圾检测
     *
     * @param $string
     * @throws ErrCodeException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function textAntiSpam($string) {
        $string = trim($string);
        if (!$string) {
            return;
        }

        $response = self::getClient()->request('POST', '/api/inside/contentsecurity/checktext', [
            'json' => [
                'text' => $string
            ]
        ]);

        if (0 != Helper::getForJsonResponse($response, 'errcode')) {
            throw new ErrCodeException(ErrorCode::TEXT_ANTI_SPAM);
        };
    }


    /**
     * 图片反垃圾检测
     *
     * @param $string
     * @throws ErrCodeException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function imageAntiSpam($ossPath) {
        $response = self::getClient()->request('POST', '/api/inside/contentsecurity/checkimage', [
            'json' => [
                'path' => $ossPath
            ]
        ]);

        if (0 != Helper::getForJsonResponse($response, 'errcode')) {
            throw new ErrCodeException(ErrorCode::TEXT_ANTI_SPAM);
        };
    }


}