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
        return self::getMediaRequest($appId, $path)->wait();
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


    /**
     * @param $appId
     * @param $path
     * @param string $type
     * @return mixed
     */
    public static function upload($appId, $path, $type = 'image') {
        return self::getUploadRequest($appId, $path, $type)->wait();
    }


    /**
     * @param $appId
     * @param $path
     * @param string $type
     * @param null $client
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public static function getUploadRequest($appId, $path, $type = 'image', $client = null) {
        $client = $client ?? self::getClient();

        return $client->requestAsync('POST', "/api/media/upload", [
            'json' => [
                'type' => $type,
                'path' => $path,
                'appId' => $appId
            ]
        ]);
    }


}