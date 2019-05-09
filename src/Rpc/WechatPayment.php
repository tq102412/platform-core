<?php

namespace Ineplant\Rpc;

class WechatPayment extends WechatBasic {


    /**
     * @param $transactionId
     * @param $refundFee
     * @param string $refundDesc
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function refund($transactionId, $refundFee, $refundDesc = '') {
        return self::getClient()->request('POST', "/api/refund/{$transactionId}", [
            'json' => [
                'refund_fee' => $refundFee,
                'refund_desc' => $refundDesc,
            ]
        ]);
    }


}