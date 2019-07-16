<?php

namespace Ineplant\Rpc;

use App\Enum\PlatformType;
use Follow\FollowClient;
use Follow\GetFollowRequest;

class GrpcFollow extends GrpcClient {

    /**
     * @var 客户端实例
     */
    protected static $client;

    protected static function getClientName() {
        return FollowClient::class;
    }

    protected static function getServAddName(): string {
        return "follow-service:8080";
    }


    /**
     * @param $appId
     * @param $openid
     * @param $unionId
     * @param bool $isBusiness
     * @param int $type
     * @return mixed
     */
    public static function getFollow($appId, $openid, $unionId, $isBusiness = false, $type = PlatformType::Wechat) {

        $request = new GetFollowRequest();

        $request->setIsBusiness($isBusiness);
        $request->setPlatformType($type);
        $request->setAppId($appId);
        $request->setOpenid($openid);
        $request->setUnionId($unionId);

        return self::getClient()->GetFollow($request)->wait();

    }

}
