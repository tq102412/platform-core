<?php

namespace Ineplant\Rpc;

class WechatCard extends WechatBasic {

    public static function create($appId, $data) {
        return self::getClient()->request('POST', "/api/card/create/$appId", [
            'json' => $data
        ]);
    }

    public static function getUser($appId, $cardId, $code) {
        return self::getClient()->request('GET', "/api/card/user/get/$appId", [
            'json' => [
                'cardId' => $cardId,
                'code' => $code,
            ]
        ]);
    }

    public static function updateUser($appId, $data) {
        return self::getClient()->request('POST', "/api/card/user/update/$appId", [
            'json' => $data
        ]);
    }

    public static function setActivationForm($appId, $cardId, $settings) {
        return self::getClient()->request('POST', "/api/card/user/update/$appId", [
            'json' => [
                'cardId' => $cardId,
                'settings' => $settings,
            ]
        ]);
    }

}