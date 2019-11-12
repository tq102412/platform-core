<?php


namespace Ineplant\Rpc;


use Appserv\AppServClient;
use Appserv\ChangeRequest;
use Appserv\XaRequest;

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
    public static function Consuming($appId, $companyId, $quantity, $xaId = '') {
        $request = new ChangeRequest();
        $request->setAppId($appId);
        $request->setCompanyId($companyId);
        $request->setQuantity($quantity);
        if ($xaId) {
            $xaRequest = new XaRequest();
            $xaRequest->setXaId($xaId);
            $request->setXa($xaRequest);
        }

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

    /**
     * 事务提交
     *
     * @param $xaId
     */
    public static function XaCommit($xaId) {
        $request = new XaRequest();
        $request->setXaId($xaId);

        self::getOrFail(self::getClient()->XaCommit($request)->wait());
    }

    /**
     * 事务回滚
     *
     * @param $xaId
     */
    public static function XaRollback($xaId) {
        $request = new XaRequest();
        $request->setXaId($xaId);

        self::getOrFail(self::getClient()->XaRollback($request)->wait());
    }
}