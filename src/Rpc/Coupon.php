<?php

namespace Ineplant\Rpc;

use Grpc\ChannelCredentials;

use Protoc\ConsumingRequest;
use Protoc\couponClient;
use Protoc\DiscountMoneyRequest;

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
                'coupon:8080',
                [
                    'credentials' => ChannelCredentials::createInsecure(),
                ]
            );
        }

        return self::$client;
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

}