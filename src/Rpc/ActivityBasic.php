<?php


namespace Ineplant\Rpc;


use Ineplant\Enum\ErrorCode;
use Ineplant\Exceptions\ReturnException;
use Ineplant\Helper;

class ActivityBasic {
    use BaseRpc;

    /**
     * @var string domain
     */
    protected static $domain;

    /**
     * 设置请求的domain
     */
    private static function setDomain() {
        if (!self::$domain) {
            self::$domain = getenv('RPC_ADDR_ACTIVITY') ?: 'http://activity:9501';
        }
    }

    /**
     * @param $activityId
     * @param $companyId
     * @param $orderno
     * @throws ReturnException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function packetOrderHandle($activityId, $companyId, $orderno) {
        self::setDomain();
        $response = self::getClient()->request('GET', '/api/activity/packet/order/handle', [
            'query' => [
                'activity_id' => $activityId,
                'company_id'  => $companyId,
                'orderno'     => $orderno
            ],
        ]);

        $response = Helper::getForJsonResponse($response);
        if (!key_exists('errcode', $response)) {
            throw new ReturnException("活动发布处理异常", ErrorCode::RPC);
        }
        if ($response['errcode']) {
            throw new ReturnException("{$response['content']} (errcode:{$response['errcode']})", ErrorCode::RPC);
        }
    }

    /**
     * 活动订单回调
     *
     * @param $orderNo
     * @param $totalMoney
     * @param $transactionId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function orderNotify($orderNo, $totalMoney, $transactionId) {
        self::setDomain();
        return self::getClient()->request('POST', '/api/activity/order/notify', [
            'json' => [
                'orderno'        => $orderNo,
                'total_fee'      => $totalMoney,
                'transaction_id' => $transactionId
            ],
        ]);
    }

    /**
     * @param $activityId
     * @return array {
     * @types string custom_name
     * @types array template ['applet_path' => xx]
     * }
     * @throws ReturnException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function activityWithTemplate($activityId) {
        self::setDomain();
        $response = self::getClient()->request('GET', '/api/act/template/info', [
            'query' => ['id' => $activityId,]
        ]);

        $response = Helper::getForJsonResponse($response);
        if (empty($response['content']['activity_template_id'])) {
            throw new ReturnException("获取活动信息失败", ErrorCode::RPC);
        }
        return $response['content'];
    }
}