<?php

namespace Ineplant\Rpc;

use Protoc\ConsumingRequest;
use Protoc\couponClient;
use Protoc\CouponCreateRequest;
use Protoc\DiscountMoneyRequest;
use Protoc\GetByIdsRequest;
use Protoc\GetCountByMemberRequest;
use Protoc\ReceivingRequest;

class Coupon extends GrpcClient
{

    /**
     * @var 客户端实例
     */
    protected static $client;

    public static function getClientName() {
        return couponClient::class;
    }

    public static function getServAddName(): string {
        return 'coupon:8080';
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
     * @param $activityId
     * @param $couponId
     * @param int $quantity
     * @return mixed
     */
    public static function Receiving($memberUnionId, $couponId, $quantity = 1, $activityId = '', $money = 0) {
        $request = new ReceivingRequest();

        $request->setMemberUnionId($memberUnionId);
        $request->setActivityId($activityId);
        $request->setMoney($money);
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

    /**
     * 创建膨胀礼券
     *
     * @param array $info
     * @return mixed
     */
    public static function creating($info) {
        $request = new CouponCreateRequest();
        $request->setType(3);
        $request->setTitle("{$info['denomination']}元膨胀礼券");
        //起始金额最小值
        $request->setFromMoney($info['from_money']);
        //起始金额最大值
        $request->setToMoney($info['to_money']);
        //券使用期限 起始
        $request->setEffectiveFromDate($info['effective_from_date']);
        //券使用期限 结束
        $request->setEffectiveToDate($info['effective_to_date']);
        $request->setCompanyId($info['company_id']);
        $request->setCreatedUserId($info['created_user_id']);
        $request->setActivityId($info['activity_id']);
        $request->setTotalSku($info['total_sku']);
        $request->setLimit(1);
        $request->setUsage(3);

        return self::getClient()->CreateCoupon($request)->wait();
    }
}