<?php


namespace Ineplant\Rpc;


use Appserv\AppServClient;
use Appserv\ChangeRequest;

class GrpcAppServ extends GrpcClient {
    /**
     * @var 客户端实例
     */
    protected static $client;

    protected static function getClientName() {
        return AppServClient::class;
    }

    protected static function getServAddName(): string {
        return "app-service:8080";
    }

    /**
     * 应用使用量预扣
     *
     * @param $appId
     * @param $companyId
     * @param $quantity
     * @return array [errCode, errMsg]
     */
    public static function Consuming($appId, $companyId, $quantity) {
        $request = new ChangeRequest();
        $request->setAppId($appId);
        $request->setCompanyId($companyId);
        $request->setQuantity($quantity);

        $response = self::getOrFail(self::getClient()->Consuming($request)->wait());
        return [$response->getCode(), $response->getMessage()];
    }

    /**
     * 应用使用量额外预扣恢复
     *
     * @param $appId
     * @param $companyId
     * @param $quantity
     * @return array [errCode, errMsg]
     */
    public static function Add($appId, $companyId, $quantity) {
        $request = new ChangeRequest();
        $request->setAppId($appId);
        $request->setCompanyId($companyId);
        $request->setQuantity($quantity);

        $response = self::getOrFail(self::getClient()->Add($request)->wait());
        return [$response->getCode(), $response->getMessage()];
    }


}