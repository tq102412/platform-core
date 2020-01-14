<?php

namespace Ineplant\Rpc;

class WechatTemplate extends WechatBasic {


    /**
     * @param $memberId
     * @param array $msg
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function send($memberId, $msg = []) {
        return self::getClient()->request('POST', "/api/template/sendonce/{$memberId}", [
            'json' => $msg
        ]);
    }

}