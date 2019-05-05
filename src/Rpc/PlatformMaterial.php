<?php

namespace Ineplant\Rpc;

class PlatformMaterial {

    use BaseRpc;

    protected static $domain = 'http://platform';

    /**
     * @param $path
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getByPath($path) {
        return self::getClient()->request('GET', '/api/material/get/by_Path', [
            'query' => [
                'path' => $path
            ]
        ]);
    }

    /**
     * @param $path
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function saveByPath($path, $data) {
        return self::getClient()->request('POST', '/api/material/save/by_path', [
            'json' => [
                'path' => $path,
                'data' => $data
            ]
        ]);
    }

}
