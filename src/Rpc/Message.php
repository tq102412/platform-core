<?php


namespace Ineplant\Rpc;


use Ineplant\Helper;

class Message {
    use BaseRpc;

    protected static $domain = 'http://message:9501';

    /**
     * 商户开通短信服务 初始化数据
     *
     * @param $companyId
     * @return array|\ArrayAccess|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function smsInit($companyId) {
        $response = self::getClient()->request('POST', '/channel/init', [
            'json' => ['company_id' => $companyId],
        ]);

        return Helper::getForJsonResponse($response);
    }
}