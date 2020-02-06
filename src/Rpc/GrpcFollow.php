<?php

namespace Ineplant\Rpc;

use Follow\FollowClient;
use Follow\FollowData;
use Follow\FollowId;
use Follow\FollowIds;
use Follow\FollowUnionRequest;
use Follow\GetByOpenidAndAppIdRequest;
use Follow\GetFollowIdRequest;
use Follow\GetFollowRequest;
use Follow\UnionsRequest;
use Ineplant\Enum\PlatformType;
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
     * @param int $type
     * @return mixed
     */
    public static function getFollow($appId, $openid, $unionId, $type = PlatformType::Wechat, $data = null) {
        $request = new GetFollowRequest();

        $request->setPlatformType($type);
        $request->setAppId($appId);
        $request->setOpenid($openid);
        $request->setUnionId($unionId);

        self::setFollowData($request, $data);

        return self::getClient()->GetFollow($request)->wait();
    }

    /**
     * @param $data
     */
    protected static function setFollowData($request, &$data) {
        $followData = new FollowData();

        isset($data['nickname']) && $followData->setNickname($data['nickname']);
        isset($data['headimgurl']) && $followData->setAvatarUrl($data['headimgurl']);
        isset($data['avatar_url']) && $followData->setAvatarUrl($data['avatar_url']);
        isset($data['city']) && $followData->setCity($data['city']);
        isset($data['country']) && $followData->setCountry($data['country']);
        isset($data['gender']) && $followData->setGender(intval($data['gender']));
        isset($data['language']) && $followData->setLanguage($data['language']);
        isset($data['province']) && $followData->setProvince($data['province']);

        $request->setData($followData);
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
    public static function getFollowIdByUnionId($unionId, $type = PlatformType::Wechat, $data = null) {
        $request = new GetFollowIdRequest();
        $request->setUnionId($unionId);
        $request->setPlatformType($type);

        self::setFollowData($request, $data);


        $result = self::getOrFail(self::getClient()->GetFollowIdByUnionId($request)->wait());

        if (!($result instanceof FollowId)) {
            throw new TypeErrorException('FollowId');
        }

        return $result;
    }


    /**
     * @param $followIds
     * @return mixed
     */
    public static function getByFollowIds($followIds = [], $nickname = '') {
        $request = new FollowIds();
        $request->setFollowIds($followIds);
        $request->setNickname($nickname);

        return self::getClient()->GetByFollowIds($request)->wait();
    }

    /**
     * @param $followId
     * @return mixed
     */
    public static function getByFollowId($followId) {
        $request = new FollowId();
        $request->setFollowId($followId);

        return self::getClient()->GetByFollowId($request)->wait();
    }

    /**
     * @param $followId
     * @param $appId
     * @return mixed
     */
    public static function getFollowUnionByFollowId($followId, $appId) {
        $request = new FollowUnionRequest();
        $request->setFollowId($followId);
        $request->setAppId($appId);

        return self::getClient()->GetFollowUnionByFollowId($request)->wait();
    }


    /**
     * @param array $followIds
     * @param $appId
     * @return mixed
     */
    public static function getUnionsByIds(array $followIds, $appId) {
        $request = new UnionsRequest();
        $request->setFollowIds($followIds);
        $request->setAppId($appId);

        return self::getClient()->GetUnionsByIds($request)->wait();
    }

    /**
     * @param array $followIds
     * @param $appId
     * @return array
     */
    public static function getOpenIds(array $followIds, $appId) {
        $result = GrpcClient::getOrFail(self::getUnionsByIds($followIds, $appId));

        $follows = $result->getFollowUnions();
        $openIds = [];
        foreach ($follows as $follow) {
            $openId = $follow->getOpenid();
            if ($openId) {
                $openIds[] = $openId;
            }
        }
        return $openIds;
    }

}
