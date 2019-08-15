<?php

namespace Ineplant\Rpc;

use Ineplant\Enum\PlatformType;
use Follow\FollowClient;
use Follow\FollowId;
use Follow\GetByOpenidAndAppIdRequest;
use Follow\GetFollowIdRequest;
use Follow\GetFollowRequest;
use Ineplant\Exceptions\TypeErrorException;

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


    /**
     * @param $appId
     * @param $openid
     * @return mixed
     */
    public static function getByOpenidAndAppId($appId, $openid) {
        $request = new GetByOpenidAndAppIdRequest();
        $request->setOpenid($openid);
        $request->setAppId($appId);

        return self::getClient()->GetByOpenidAndAppId($request)->wait();
    }

    /**
     * 获取followId
     *
     * @param $unionId
     * @param int $type
     * @return FollowId
     * @throws TypeErrorException
     */
    public static function getFollowIdByUnionId($unionId, $type = PlatformType::Wechat) {
        $request = new GetFollowIdRequest();
        $request->setUnionId($unionId);
        $request->setPlatformType($type);


        $result = self::getOrFail(self::getClient()->GetFollowIdByUnionId($request)->wait());

        if (!($result instanceof FollowId)) {
            throw new TypeErrorException('FollowId');
        }

        return $result;
    }

}
