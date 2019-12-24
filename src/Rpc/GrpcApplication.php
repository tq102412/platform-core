<?php


namespace Ineplant\Rpc;


use Application\ApplicationClient;
use Application\Order;
use Application\User;

class GrpcApplication extends GrpcHyperClient {

    protected static function getServAddName(): string {
        return "application:9503";
    }

    protected static function getClientName() {
        return ApplicationClient::class;
    }

    /**
     * 应用订单支付回调
     *
     * @param $orderNo
     * @param $totalMoney
     * @return mixed
     */
    public static function handleNotify($orderNo, $totalMoney) {
        $request = new Order();
        $request->setOrderno($orderNo);
        $request->setTotalMoney($totalMoney);

        list($reply, $status) = self::getClient()->appOrderNotify($request);
        return $reply->getStatus();
    }

    /**
     * 试用套餐发放
     *
     * @param $clientId
     * @param $companyId
     * @return mixed
     */
    public static function trialSend($clientId, $companyId) {
        $request = new User();
        $request->setClientId($clientId);
        $request->setCompanyId($companyId);

        list($reply, $status) = self::getClient()->trialSend($request);
        return $reply->getStatus();
    }
}