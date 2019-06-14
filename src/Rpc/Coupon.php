<?php

namespace Ineplant\Rpc;

use Grpc\ChannelCredentials;
use Protoc\DiscountMoneyRequest;

class Coupon     {

    public static function GetDiscountMoney() {

        $client = new \Protoc\CouponClient(
            '',
            [
                'credentials' => ChannelCredentials::createInsecure(),
            ]
        );

        $request = new DiscountMoneyRequest();
        $request->setCouponCode();
        $request->setMemberUnionId();
        $request->setMoney();
        $request->setShopId();
        $request->setUsage();

        list($reply, $status) = $client->GetDiscountMoney($request)->wait();

        echo $status . PHP_EOL;
        echo $reply->serializeToJsonString();
    }

}