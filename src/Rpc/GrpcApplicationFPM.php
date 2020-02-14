<?php


namespace Ineplant\Rpc;


use Application\ApplicationFPMClient;
use Application\CompanyApp;
use Application\Order;
use Application\PayOrder;
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
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function handleNotify($orderNo, $totalMoney) {
        $request = new Order();
        $request->setOrderno($orderNo);
        $request->setTotalMoney($totalMoney);

        $response = GrpcHyperClient::getOrFail(self::getClient()->appOrderNotify($request)->wait());
        return $response->getStatus();
    }

    /**
     * 自动购买免费应用
     *
     * @param $appId
     * @param $companyId
     * @return mixed
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function autoPurchaseInfo($appId, $companyId) {
        $purchaseInfo = new PurchaseInfo();
        $purchaseInfo->setAppId($appId);
        $purchaseInfo->setCompanyId($companyId);

        $response = GrpcHyperClient::getOrFail(self::getClient()->autoPurchase($purchaseInfo)->wait());
        return $response->getStatus();
    }

    /**
     * 获取购买过的应用
     *
     * @param $companyId
     * @return mixed
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function paidApps($companyId) {
        $companyApp = new CompanyApp();
        $companyApp->setCompanyId($companyId);

        $response = GrpcHyperClient::getOrFail(self::getClient()->paidApps($companyApp)->wait());
        return $response->getApps();

    }

    /**
     * @param $orderNo
     * @return array
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function getOrder($orderNo) {
        $request = new PayOrder();
        $request->setOrderno($orderNo);

        $order = GrpcHyperClient::getOrFail(self::getClient()->getOrder($request)->wait());
        return GrpcApplication::orderToArr($order);
    }

    /**
     * @param $orderNo
     * @return array
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function saveOrder($orderData) {
        $request = GrpcApplication::creOrder($orderData);

        $response = GrpcHyperClient::getOrFail(self::getClient()->saveOrder($request)->wait());
        return $response->getStatus();
    }
}