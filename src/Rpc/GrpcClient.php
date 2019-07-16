<?php

namespace Ineplant\Rpc;

use Grpc\ChannelCredentials;

abstract class GrpcClient {



    /**
     * @var string rpc服务端地址+端口
     */
    protected static $servAdd = '';

    /**
     * @var string rpc客户端class名称
     */
    protected static $clientName = '';


    /**
     * @return mixed
     */
    public static function getClient() {
        if (empty(static::$client)) {
            $app = static::getClientName();

            static::$client = new $app(
                static::getServAdd(),
                [
                    'credentials' => ChannelCredentials::createInsecure(),
                ]
            );
        }

        return static::$client;
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

        $servAdd .= static::getServAddName();

        return $servAdd;
    }

    /**
     * exp return coupon:8080
     *
     * @return string
     */
    abstract protected static function getServAddName(): string;

    /**
     * exp return coupon:8080
     *
     * @return string
     */
    abstract protected static function getClientName();

}
