<?php

namespace Ineplant\Rpc;

use Ineplant\Exceptions\ReturnException;
use Ineplant\Helper;

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
                'refund_fee'  => $refundFee,
                'refund_desc' => $refundDesc,
            ]
        ]);
    }

    /**
     * 支付码扣款并获取到支付结果
     * @param array $company {
     * @type string $company_id
     * @type string $name
     * }
     * @param string $authCode 付款码
     * @param string $totalFee 支付金额 (分)
     * @return mixed transaction_id
     * @throws ReturnException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function codePayWithResult($company, $authCode, $totalFee) {
        $response = self::getClient()->request('POST', "/api/wx/pay/code", [
            'json' => [
                'company'   => $company,
                'auth_code' => $authCode,
                'total_fee' => $totalFee,
            ]
        ]);
        return Helper::HttpRpcResult($response);
    }

    /**
     * @param $company
     * @param $transactionId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function codePayReverse($company, $transactionId) {
        return self::getClient()->request('POST', "/api/wx/pay/code/reverse", [
            'json' => [
                'company_id'     => $company,
                'transaction_id' => $transactionId,
            ]
        ]);
    }

}