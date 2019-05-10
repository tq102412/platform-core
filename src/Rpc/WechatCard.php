<?php

namespace Ineplant\Rpc;

class WechatCard extends WechatBasic {


    /**
     * @param $appId
     * @param $data
     * @param string $type
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function create($appId, $data, $type = 'member_card') {
        return self::getClient()->request('POST', "/api/card/create", [
            'json' => [
                'appId' => $appId,
                'data' => $data,
                'type' => $type,
            ]
        ]);
    }


    /**
     * @param $appId
     * @param $cardId
     * @param $code
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getUser($appId, $cardId, $code) {
        return self::getClient()->request('GET', "/api/card/user/get", [
            'json' => [
                'cardId' => $cardId,
                'code' => $code,
                'appId' => $appId
            ]
        ]);
    }


    /**
     * @param $appId
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function updateUser($appId, $data) {
        return self::getClient()->request('POST', "/api/card/user/update", [
            'json' => [
                'appId' => $appId,
                'data'  => $data
            ]
        ]);
    }


    /**
     * @param $appId
     * @param $cardId
     * @param $settings
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function setActivationForm($appId, $cardId, $settings) {
        return self::getClient()->request('POST', "/api/card/activationform/set/$cardId", [
            'json' => [
                'appId' => $appId,
                'settings' => $settings,
            ]
        ]);
    }


    /**
     * @param $appId
     * @param $info
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function activate($appId, $info) {
        return self::getClient()->request('POST', "/api/card/activate", [
            'json' => [
                'card'  => $info,
                'appId' => $appId
            ]
        ]);
    }


    /**
     * @param $appId
     * @param $cardId
     * @param $attributes
     * @param string $type
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function update($appId, $cardId, $attributes, $type = 'member_card') {
        return self::getClient()->request('POST', "/api/card/update/$cardId", [
            'json' => [
                'appId' => $appId,
                'type' => $type,
                'attributes' => $attributes,
            ]
        ]);
    }

}