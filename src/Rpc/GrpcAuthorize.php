<?php

namespace Ineplant\Rpc;

use Authorize\AuthFollow;
use Authorize\AuthInfo;
use Authorize\AuthorizeClient;

class GrpcAuthorize extends GrpcClient {

    /**
     * @var 客户端实例
     */
    protected static $client;

    //1是普通用户，2是商家用户，3是大后台用户
    const User = 1;
    const Company = 2;
    const System = 3;


    protected static function getClientName() {
        return AuthorizeClient::class;
    }

    protected static function getServAddName(): string {
        return "authorize-service:8080";
    }


    /**
     * @param $companyId
     * @param $userId
     * @param $followId
     * @return mixed
     */
    public static function auth($companyId, $userId, $followId) {
        $request = new AuthInfo();

        $request->setCompanyId($companyId);
        $request->setUserId($userId);
        $request->setFollowId($followId);

        return self::getClient()->auth($request)->wait();
    }

    /**
     * @param $followId
     * @return mixed
     */
    public static function authFollow($followId) {
        $request = new AuthFollow();

        $request->setFollowId($followId);

        return self::getClient()->auth($request)->wait();
    }


}