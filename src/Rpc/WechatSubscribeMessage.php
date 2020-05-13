<?php

namespace Ineplant\Rpc;

class WechatSubscribeMessage extends WechatBasic {


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

    /**
     * @param $appId
     * @param $templateId
     * @param $openIds
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function sendWinningResultByOpenIds($appId, $templateId, $openIds, $data) {
        $json = [
            'appid'    => $appId,
            'open_ids' => $openIds,
            'info'     => [
                'template_id' => $templateId,
                'page'        => 'pages/home/index/index',
                'data'        => [
                    'thing1' => $data[0], // 开奖结果
                    'thing2' => $data[1], // 活动名称
                    'thing3' => $data[2], // 商家名称
                    'date4'  => $data[3], // 开奖时间
                    'thing5' => $data[4], // 备注
                ],
            ],

        ];

        return self::getClient()->request('POST', "/api/subscribe/message/batch/send", [
            'json' => $json,
        ]);
    }


    /**
     * 活动开始前提醒发送，异步
     *
     * @param $appId
     * @param $templateId
     * @param $openIds
     * @param $data
     * @param string $page
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public static function sendActivityStartByOpenIds(
        $appId,
        $templateId,
        $openIds,
        $data,
        $page = 'pages/home/index/index'
    ) {

        $json = [
            'thing1' => $data[0], // 活动名称
            'date6'  => $data[1], // 开始时间
            'thing5' => $data[2], // 温馨提示
        ];

        return self::sendAsyncActivityByOpenIds($appId, $templateId, $openIds, $json, $page);
    }


    /**
     * @param $appId
     * @param $templateId
     * @param $openIds
     * @param $data
     * @param string $page
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public static function sendAsyncActivityByOpenIds(
        $appId,
        $templateId,
        $openIds,
        $data,
        $page = 'pages/home/index/index'
    ) {
        $json = [
            'appid'    => $appId,
            'open_ids' => $openIds,
            'info'     => [
                'template_id' => $templateId,
                'page'        => $page,
                'data'        => $data
            ],
        ];

        return self::getClient()->requestAsync('POST', "/api/subscribe/message/batch/send", [
            'json' => $json,
        ]);
    }

}