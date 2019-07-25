<?php

namespace Ineplant\Rpc;

use Account\AccountClient;
use Account\Associations;
use Account\CancelRequest;
use Account\ChangeRequest;
use Account\CreatesRequest;
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
        $cancelRequest->setOriginBillType($cancelData['origin_bill_type']);


        return self::getClient()->Cancel($cancelRequest)->wait();
    }


    /**
     * @param $accountType
     * @param $association
     * @return mixed
     */
    public static function GetOne($accountType, $association) {
        $request = new Associations([
            'account_type' => $accountType,
            'association'  => $association,
        ]);

        return self::getClient()->Get($request)->wait();
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


}
