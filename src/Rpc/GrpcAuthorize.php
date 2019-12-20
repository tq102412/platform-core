<?php

namespace Ineplant\Rpc;

use Authorize\AuthBig;
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
        return "authorize:8080";
    }


    /**
     * 授权
     *
     * @param $companyId
     * @param $userId
     * @param $followId
     * @param string $clientId
     * @return mixed
     */
    public static function auth($companyId, $userId, $followId, $clientId = '') {
        $request = new AuthInfo();

        $request->setCompanyId($companyId);
        $request->setUserId($userId);
        $request->setFollowId($followId);
        $request->setClientId($clientId);

        return self::getClient()->auth($request)->wait();
    }

    /**
     * @param $followId
     * @return mixed
     */
    public static function authFollow($followId) {
        $request = new AuthFollow();

        $request->setFollowId($followId);

        return self::getClient()->authFollow($request)->wait();
    }


    /**
     * @param int $uid
     * @return mixed
     */
    public static function authBig(int $uid) {
        $request = new AuthBig();

        $request->setUid($uid);

        return self::getClient()->authBig($request)->wait();
    }


}