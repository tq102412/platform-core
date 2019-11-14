<?php


namespace Ineplant\Rpc;


use Ineplant\Enum\ErrorCode;
use Ineplant\Exceptions\ErrCodeException;
use Ineplant\Helper;

class Platform {
    use BaseRpc;

    protected static $domain = 'http://platform';

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

        $response = self::getClient()->request('POST', '/api/aliyun/text/check', [
            'json' => [
                'text' => $string
            ]
        ]);

        if (0 != Helper::getForJsonResponse($response, 'errcode')) {
            throw new ErrCodeException(ErrorCode::TEXT_ANTI_SPAM);
        };
    }
}