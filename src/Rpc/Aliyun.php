<?php

namespace Ineplant\Rpc;

class Aliyun {

    use BaseRpc;

    protected static $domain = 'http://aliyun:60005';

    /**
     * @param $body
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function aPushMessageSend($body) {
        $response = self::getClient()->request('POST', '/apush/message/send', [
            'json' => $body
        ]);

        return $response;
    }


}
