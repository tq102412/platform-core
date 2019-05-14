<?php

namespace Ineplant\Rpc;

class WechatUser extends WechatBasic
{


    /**
     * @param $appId
     * @param $data
     * @param string $type
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function get($openid, $appId)
    {
        return self::getClient()->request('GET', "/api/user/get/{$openid}", [
            'query' => [
                'appId' => $appId
            ]
        ]);
    }


}