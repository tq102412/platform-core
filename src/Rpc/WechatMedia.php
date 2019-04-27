<?php

namespace Ineplant\Rpc;

use App\Rpc\WechatBasic;

class WechatMedia extends WechatBasic {

    public static function uploadImage($appId, $path) {
        return self::getClient()->request('POST', "/api/media/up_image/$appId", [
            'json' => [
                'path' => $path,
            ]
        ]);
    }


}