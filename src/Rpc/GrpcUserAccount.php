<?php

namespace Ineplant\Rpc;


use Ucenteraccount\AccountClient;
use Ucenteraccount\ChangeRequest;
use Ucenteraccount\GetRequest;
use Ucenteraccount\Xa;

class GrpcUserAccount extends GrpcClient {

    protected static $client;

    protected static function getClientName() {
        return AccountClient::class;
    }

    protected static function getServAddName(): string {
        return "ucenteraccount:8080";
    }

    /**
     * @param array $request {
     * @type string userId
     * @type string companyId
     * @type string comment
     * @type string action
     * @type string xa
     * @type string originId
     * @type string originType
     * @type int price
     * }
     * @return mixed
     */
    public static function change($request = []) {
        $changeRequest = new ChangeRequest();
        $changeRequest->setUserId($request['userId']);
        $changeRequest->setCompanyId($request['companyId']);
        $changeRequest->setComment($request['comment']);
        $changeRequest->setAction($request['action']);
        $changeRequest->setXa($request['xa']);
        $changeRequest->setOriginId($request['originId']);
        $changeRequest->setOriginType($request['originType']);
        $changeRequest->setPrice($request['price']);

        return self::getClient()->Change($changeRequest)->wait();
    }


    /**
     * @param $userId
     * @return mixed
     */
    public static function get($userId) {
        $getRequest = new GetRequest();
        $getRequest->setUserId($userId);

        return self::getClient()->Get($getRequest)->wait();
    }


    /**
     * @param string $xaId
     * @return mixed
     */
    public static function XaCommit($xaId = "") {
        $xaRequest = new Xa();
        $xaRequest->setId($xaId);

        return self::getClient()->XaCommit($xaRequest)->wait();
    }


    /**
     * @param string $xaId
     * @return mixed
     */
    public static function XaRollback($xaId = "") {
        $xaRequest = new Xa();
        $xaRequest->setId($xaId);

        return self::getClient()->XaRollback($xaRequest)->wait();
    }
}