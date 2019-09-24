<?php


namespace Ineplant\Rpc;


use Application\ApplicationClient;
use Application\Order;

class GrpcApplication extends GrpcClient {
    /**
     * @var 客户端实例
     */
    protected static $client;

    protected static function getClientName() {
        return ApplicationClient::class;
    }

    protected static function getServAddName(): string {
        return "application:9503";
    }

    public static function handleNotify($orderNo, $totalMoney) {
        $client = new ApplicationClient('application:9503', [
            'credentials' => null,
        ]);
        $request = new Order();
        $request->setOrderno($orderNo);
        $request->setTotalMoney($totalMoney);

        list($reply, $status) = $client->appOrderNotify($request);
        return $reply->getStatus();
    }
}