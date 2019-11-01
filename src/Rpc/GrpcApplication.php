<?php


namespace Ineplant\Rpc;


use Application\ApplicationClient;
use Application\Order;

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
}