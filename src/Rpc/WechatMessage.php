<?php

namespace Ineplant\Rpc;

use Ineplant\Enum\MessageType;

class WechatMessage extends WechatBasic {


    /**
     * @param $appId
     * @param $openid
     * @param $message
     * @param string $type
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function send($appId, $openid, $message, $type = MessageType::Text) {
        return self::getClient()->request('POST', "/api/message/send", [
            'json' => [
                'appId'    => $appId,
                'openid'   => $openid,
                'messages' => $message,
                'type'     => $type,
            ],
        ]);
    }

}