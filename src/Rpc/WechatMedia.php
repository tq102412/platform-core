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
        return self::getMediaRequest()->wait();
    }


    /**
     * @param $appId
     * @param $path
     * @param null $client
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public static function getMediaRequest($appId, $path, $client = null) {

        $client = $client ?? self::getClient();

        return $client->requestAsync('POST', "/api/media/up_image", [
            'json' => [
                'path' => $path,
                'appId' => $appId
            ]
        ]);
    }


}