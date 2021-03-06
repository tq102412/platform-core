<?php


namespace Ineplant\Rpc;


use Appserv\AppServHyperfClient;
use Appserv\ChangeRequest;
use Ineplant\Enum\ErrorCode;
use Ineplant\Exceptions\ReturnException;

class GrpcHyperfAppServ extends GrpcHyperClient {

    protected static function getServAddName(): string {
        return 'app-service:8080';
    }

    protected static function getClientName() {
        return AppServHyperfClient::class;
    }

    /**
     * 应用使用量预扣
     *
     * @param $appId
     * @param $companyId
     * @param $quantity
     * @return array
     * @throws ReturnException
     */
    public static function Consuming($appId, $companyId, $quantity) {
        $request = new ChangeRequest();
        $request->setAppId($appId);
        $request->setCompanyId($companyId);
        $request->setQuantity($quantity);

        list($response, $status) = self::getClient()->Consuming($request);
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

        list($response, $status) = self::getClient()->Add($request);
        return [$response->getCode(), $response->getMessage()];
    }
}