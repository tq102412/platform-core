<?php

namespace Ineplant\Rpc;

class WechatCard extends WechatBasic {

    public static function create($appId, $data) {
        return self::getClient()->request('POST', "/api/card/create", [
            'json' => [
                'appId' => $appId,
                'data' => $data,
            ]
        ]);
    }

    public static function getUser($appId, $cardId, $code) {
        return self::getClient()->request('GET', "/api/card/user/get", [
            'json' => [
                'cardId' => $cardId,
                'code' => $code,
                'appId' => $appId
            ]
        ]);
    }

    public static function updateUser($appId, $data) {
        return self::getClient()->request('POST', "/api/card/user/update/$appId", [
            'json' => [
                'appId' => $appId,
                'data'  => $data
            ]
        ]);
    }

    public static function setActivationForm($appId, $cardId, $settings) {
        return self::getClient()->request('POST', "/api/card/user/update/$cardId", [
            'json' => [
                'appId' => $appId,
                'settings' => $settings,
            ]
        ]);
    }

    public static function activate($appId, $info) {
        return self::getClient()->request('POST', "/api/card/activity/$appId", [
            'json' => $info
        ]);
    }

}