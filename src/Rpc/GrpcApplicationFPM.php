<?php


namespace Ineplant\Rpc;


use Application\ApplicationFPMClient;
use Application\Order;

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

    public static function handleNotify($orderNo, $totalMoney) {
        $request = new Order();
        $request->setOrderno($orderNo);
        $request->setTotalMoney($totalMoney);

        $response = self::getOrFail(self::getClient()->appOrderNotify($request)->wait());
        return $response->getStatus();
    }
}