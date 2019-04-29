<?php

namespace Ineplant\Rpc;

use App\Rpc\WechatBasic;

class WechatMedia extends WechatBasic {

    /**
     * @param $appId
     * @param $path
     * @return mixed
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