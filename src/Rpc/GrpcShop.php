<?php

namespace Ineplant\Rpc;

use Protoc\GetShopRequest;
use Protoc\ShopClient;

class GrpcShop extends GrpcClient {


    protected static $client;

    protected static function getClientName() {
        return ShopClient::class;
    }

    protected static function getServAddName(): string {
        return "platform:8080";
    }

    /**
     * @param string $shopId
     * @param int $status
     * @return mixed
     */
    public static function getShop($shopId, $status = -1) {
        $getShopRequest = new GetShopRequest();
        $getShopRequest->setShopId($shopId);
        $getShopRequest->setStatus($status);

        return self::getClient()->GetShop($getShopRequest)->wait();
    }

}