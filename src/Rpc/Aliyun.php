<?php

namespace Ineplant\Rpc;

class Aliyun {

    use BaseRpc;

    protected static $domain = 'http://aliyun:60005';

    public static function aPushMessageSend($body) {
        $response = self::getClient()->request('POST', '/apush/message/send', [
            'json' => $body
        ]);

        return $response;
    }


}
