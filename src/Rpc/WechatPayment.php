<?php

namespace Ineplant\Rpc;

use Illuminate\Support\Str;
use Ineplant\Enum\PaySources;
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
     * @param $transactionId
     * @param $refundFee
     * @param $logHandle 'Log::class'
     * @param string $refundDesc
     * @return array 使用list($success, $refundException) = $return
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function refundWithResult($transactionId, $refundFee, $logHandle, $refundDesc = '') {
        //用于开发调试的判断
        if ('local' == config('app.env')) {
            if (Str::startsWith($transactionId, 'test_fail')) {
                return [false, '退款请求异常，请联系商家(开发测试'];
            }
            if (Str::startsWith($transactionId, 'test_success')) {
                return [true, 'SUCCESS(开发测试'];
            }
        }

        try {
            $response = self::refund($transactionId, $refundFee, $refundDesc);
            return [true, $response->getBody()->getContents()];
        } catch (\Exception $e) {
            $exception = $e->hasResponse()
                ? (string)$e->getResponse()->getBody() : '退款请求无响应，请联系商家';

            if (strlen($exception) > 1000) {
                call_user_func([$logHandle, 'error'], $exception);
                $exception = '退款请求异常，请联系商家';
            }

            return [false, $exception];
        }
    }

    /**
     * 支付码扣款并获取到支付结果
     *
     * @param array $company {
     * @type string $company_id
     * @type string $name
     * }
     * @param string $authCode 付款码
     * @param string $totalFee 支付金额 (分)
     * @param $source
     * @param $customAttach
     * @return array ['transaction_id', 'total_fee', 'cash_fee', 'promotion_detail']
     * @throws ReturnException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function codePayWithResult($company, $authCode, $totalFee, $source = PaySources::CONSUME, $customAttach = []) {
        $response = self::getClient()->request('POST', "/api/wx/pay/code", [
            'json' => [
                'company'       => $company,
                'auth_code'     => $authCode,
                'total_fee'     => $totalFee,
                'source'        => $source,
                'custom_attach' => $customAttach,
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

    /**
     * @param $appId
     * @param $followId
     * @param $price
     * @param $tradeNo
     * @param $originId
     * @param $originType
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function payToBalance($appId, $followId, $price, $tradeNo, $originId, $originType) {
        return self::getClient()->request('POST', "/api/wx/pay/to_balance", [
            'json' => [
                'app_id'      => $appId,
                'follow_id'   => $followId,
                'price'       => $price,
                'trade_no'    => $tradeNo,
                'origin_id'   => $originId,
                'origin_type' => $originType
            ]
        ]);

    }

}