<?php

namespace Ineplant\Rpc;

use Account\AccountClient;
use Account\Associations;
use Account\BetweenRequest;
use Account\CancelRequest;
use Account\ChangeRequest;
use Account\ConditionRequest;
use Account\CreatesRequest;
use Account\GetLogRequest;
use Account\GetRequest;
use Account\XaRequest;

class GrpcAccount extends GrpcClient {


    protected static $client;

    protected static function getClientName() {
        return AccountClient::class;
    }

    protected static function getServAddName(): string {
        return "account-service:8080";
    }


    /**
     * @param string $xaId
     * @return mixed
     */
    public static function XaCommit($xaId = "") {
        $xaRequest = new XaRequest();
        $xaRequest->setXaId($xaId);

        return self::getClient()->XaCommit($xaRequest)->wait();
    }


    /**
     * @param string $xaId
     * @return mixed
     */
    public static function XaRollback($xaId = "") {
        $xaRequest = new XaRequest();
        $xaRequest->setXaId($xaId);

        return self::getClient()->XaRollback($xaRequest)->wait();
    }

    /**
     * @param \Account\CreateRequest[] $createRequest
     * @param string $xaId
     * @return mixed
     */
    public static function Create($createRequest = [], $xaId = "") {
        $xaRequest = new XaRequest();
        $xaRequest->setXaId($xaId);

        $createsRequest = new CreatesRequest();
        $createsRequest->setXa($xaRequest);
        $createsRequest->setCreates($createRequest);

        return self::getClient()->Create($createsRequest)->wait();
    }

    /**
     * @param array $cancelData
     * @param string $xaId
     * @return mixed
     */
    public static function Cancel($cancelData = [], $xaId = "") {

        $xaRequest = new XaRequest();
        $xaRequest->setXaId($xaId);

        $cancelRequest = new CancelRequest();
        $cancelRequest->setXa($xaRequest);
        $cancelRequest->setCreatedUserId($cancelData['created_user_id']);
        $cancelRequest->setAction($cancelData['action']);
        $cancelRequest->setBillCode($cancelData['bill_code']);
        $cancelRequest->setBillType($cancelData['bill_type']);
        $cancelRequest->setComment($cancelData['comment']);
        $cancelRequest->setCreatedShopId($cancelData['created_shop_id']);
        $cancelRequest->setOriginBillCode($cancelData['origin_bill_code']);


        return self::getClient()->Cancel($cancelRequest)->wait();
    }


    /**
     * @param $accountType
     * @param $association
     * @return mixed
     */
    public static function GetOne($accountType, $association) {
        $request = new Associations();

        $request->setAccountType($accountType);
        $request->setAssociation($association);

        return self::getClient()->GetOne($request)->wait();
    }

    /**
     *
     * 批量获取账户
     *
     * @param array $associationArr {
     * @type Associations {
     * @type string account_type
     * @type string association
     *     }
     * }
     *
     * @return mixed
     */
    public static function Get($associationArr = []) {
        $getRequest = new GetRequest();

        $associations = [];

        foreach ($associationArr as $item) {
            $association = new Associations();
            $association->setAccountType($item['account_type']);
            $association->setAssociation($item['association']);

            array_push($associations, $association);
        }

        $getRequest->setAssociations($associations);

        return self::getClient()->Get($getRequest)->wait();
    }


    /**
     * @param ChangeRequest $changeRequest
     * @return mixed
     */
    public static function Change(ChangeRequest $changeRequest) {
        return self::getClient()->Change($changeRequest)->wait();
    }


    /**
     * @param array $getLogRequest {
     * @type array type
     * @type string association
     * @type int change_balance
     * @type int limit
     * @type int offset
     * @type int query_balance 0/-1/1 0是忽略查询条件 1是查询大于change_balance的 -1查询小于
     * @type string from_date
     * @type string to_date
     * }
     * @return mixed
     */
    public static function GetLog(array $getLogRequest) {
        $request = new GetLogRequest();
        $request->setAssociation($getLogRequest['association']);
        $request->setChangeBalance($getLogRequest['change_balance']);
        $request->setLimit($getLogRequest['limit']);
        $request->setOffset($getLogRequest['offset']);

        isset($getLogRequest['type']) && $request->setType((array)$getLogRequest['type']);
        isset($getLogRequest['from_date']) && $request->setFromDate($getLogRequest['from_date']);
        isset($getLogRequest['query_balance']) && $request->setQueryBalance($getLogRequest['query_balance']);
        isset($getLogRequest['to_date']) && $request->setToDate($getLogRequest['to_date']);

        return self::getClient()->GetLog($request)->wait();
    }


    /**
     * 通过关联id获取符合条件的账户的关联id
     *
     * @param int $maxBalance
     * @param int $minBalance
     * @param int $accountType
     * @param array $associationIds
     * @return mixed
     */
    public static function GetByBetween(int $maxBalance, int $minBalance, int $accountType, $associationIds = []) {
        $request = new BetweenRequest();
        $request->setAccountType($accountType);
        $request->setAssociationId($associationIds);
        $request->setMinBalance($maxBalance);
        $request->setMaxBalance($minBalance);

        return self::getClient()->GetByCondition()->wait();
    }

}
