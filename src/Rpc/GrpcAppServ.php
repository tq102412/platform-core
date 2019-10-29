<?php


namespace Ineplant\Rpc;


use Appserv\ConsumeClient;
use Appserv\ConsumingRequest;

class GrpcAppServ extends GrpcClient {
    /**
     * @var 客户端实例
     */
    protected static $client;

    protected static function getClientName() {
        return ConsumeClient::class;
    }

    protected static function getServAddName(): string {
        return "app-service:8080";
    }

    /**
     * @param $appId
     * @param $companyId
     * @param $quantity
     * @return array [errCode, errMsg]
     */
    public static function Consuming($appId, $companyId, $quantity) {
        $request = new ConsumingRequest();
        $request->setAppId($appId);
        $request->setCompanyId($companyId);
        $request->setQuantity($quantity);

        $response = self::getOrFail(self::getClient()->Consuming($request)->wait());
        return [$response->getCode(), $response->getMessage()];
    }


}