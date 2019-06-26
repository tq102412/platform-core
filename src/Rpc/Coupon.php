<?php

namespace Ineplant\Rpc;

use Grpc\ChannelCredentials;

use Protoc\ConsumingRequest;
use Protoc\couponClient;
use Protoc\DiscountMoneyRequest;
use Protoc\GetByIdsRequest;
use Protoc\GetCountByMemberRequest;
use Protoc\ReceivingRequest;

class Coupon {

    /**
     * @var couponClient
     */
    protected static $client;

    /**
     * @return couponClient
     */
    public static function getClient() {
        if (empty(self::$client)) {
            self::$client = new couponClient(
                self::getServAdd(),
                [
                    'credentials' => ChannelCredentials::createInsecure(),
                ]
            );
        }

        return self::$client;
    }


    /**
     * 获取服务地址
     *
     * @return string
     */
    public static function getServAdd() {
        $env = getenv("SERVICE_ENV");

        $servAdd = '';

        if (!empty($env)) {
            $servAdd = $env . "-";
        }

        $servAdd .= "coupon:8080";

        return $servAdd;
    }

    /**
     * @param $couponCode
     * @param $memberUnionId
     * @param $money
     * @param $shopId
     * @param int $usage
     * @return array
     */
    public static function GetDiscountMoney($couponCode, $memberUnionId, $money, $shopId, int $usage = 1) {
        $request = new DiscountMoneyRequest();
        $request->setCouponCode($couponCode);
        $request->setMemberUnionId($memberUnionId);
        $request->setMoney($money);
        $request->setShopId($shopId);
        $request->setUsage($usage);

        return self::getClient()->GetDiscountMoney($request)->wait();
    }

    /**
     * @param $couponCode
     * @param $memberUnionId
     * @param $shopId
     * @param int $usage
     * @param string $createdUserId
     * @return array
     */
    public static function Consuming($couponCode, $memberUnionId, $shopId, $usage = 1, $createdUserId = '') {
        $request = new ConsumingRequest();

        $request->setCouponCode($couponCode);
        $request->setMemberUnionId($memberUnionId);
        $request->setShopId($shopId);
        $request->setUsage($usage);
        $request->setCreatedUserId($createdUserId);

        return self::getClient()->Consuming($request)->wait();
    }


    /**
     * 领取优惠券
     *
     * @param $memberUnionId
     * @param $couponId
     * @return array
     */
    public static function Receiving($memberUnionId, $couponId, $quantity = 1) {
        $request = new ReceivingRequest();

        $request->setMemberUnionId($memberUnionId);
        $request->setCouponId($couponId);
        $request->setQuantity($quantity);

        return self::getClient()->Receiving($request)->wait();
    }


    /**
     * 获取优惠券通过ids
     *
     * @param array $ids
     * @return array
     */
    public static function getByIds(array $ids) {

        $request = new GetByIdsRequest();
        $request->setCouponIds($ids);

        return self::getClient()->GetByIds($request)->wait();

    }


    /**
     * 获取优惠券数量
     *
     * @param string $memberId
     * @param int $status
     * @return array
     */
    public static function GetCountByMember(string $memberId, int $status) {
        $request = new GetCountByMemberRequest();
        $request->setMemberUnionId($memberId);
        $request->setStatus($status);

        return self::getClient()->GetCountByMember($request)->wait();
    }

}