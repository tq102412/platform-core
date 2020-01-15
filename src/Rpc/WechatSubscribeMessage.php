<?php

namespace Ineplant\Rpc;

class WechatSubscribeMessageController extends WechatBasic {


    /**
     * @param $memberId
     * @param array $msg
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function send($appId, $data = []) {
        return self::getClient()->request('POST', "/api/subscribe/sendonce/{$appId}", [
            'json' => $data,
        ]);
    }

    /**
     * @param $appId
     * @param $touser
     * @param mixed ...$data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sendWinningResult($appId, $templateId, $openid, ...$data) {
        $json = [
            'template_id' => $templateId,
            'page'        => 'pages/home/index/index',
            'touser'      => $openid,
            'data'        => [
                'thing1' => $data[0], // 开奖结果
                'thing2' => $data[1], // 活动名称
                'thing3' => $data[2], // 商家名称
                'date4'  => $data[3], // 开奖时间
                'thing5' => $data[4], // 备注
            ],
        ];

        return self::send($appId, $json);
    }

}