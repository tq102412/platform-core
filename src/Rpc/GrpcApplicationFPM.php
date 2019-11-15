<?php


namespace Ineplant\Rpc;


use Application\ApplicationFPMClient;
use Application\Order;
use Application\PurchaseInfo;

class GrpcApplicationFPM extends GrpcClient {

    /**
     * @var 客户端实例
     */
    protected static $client;

    protected static function getClientName() {
        return ApplicationFPMClient::class;
    }

    protected static function getServAddName(): string {
        return "application:9503";
    }

    /**
     * 订单支付回调
     *
     * @param $orderNo
     * @param $totalMoney
     * @return mixed
     */
    public static function handleNotify($orderNo, $totalMoney) {
        $request = new Order();
        $request->setOrderno($orderNo);
        $request->setTotalMoney($totalMoney);

        $response = self::getOrFail(self::getClient()->appOrderNotify($request)->wait());
        return $response->getStatus();
    }

    /**
     * 自动购买免费应用
     *
     * @param $appId
     * @param $companyId
     * @return mixed
     */
    public static function autoPurchaseInfo($appId, $companyId) {
        $purchaseInfo = new PurchaseInfo();
        $purchaseInfo->setAppId($appId);
        $purchaseInfo->setCompanyId($companyId);

        $response = self::getOrFail(self::getClient()->autoPurchase($purchaseInfo)->wait());
        return $response->getStatus();
    }
}