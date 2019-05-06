<?php

namespace Ineplant\Rpc;

class WechatMedia extends WechatBasic {

    /**
     * @param $appId
     * @param $path
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function uploadImage($appId, $path) {
        return self::getClient()->request('POST', "/api/media/up_image", [
            'json' => [
                'path' => $path,
                'appId' => $appId
            ]
        ]);
    }


}