<?php

namespace Ineplant\Rpc;

use Grpc\ChannelCredentials;
use Ineplant\GrpcException;

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
    public static function getClient($newInstance = false) {
        if ($newInstance || empty(static::$client)) {
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
     * 获取返回结果或者抛出一个异常
     *
     * @param array $result
     * @return array|mixed
     * @throws GrpcException
     */
    public static function getOrFail($result = []) {
        list($result, $status) = $result;

        if (0 != $status->code) {
            throw new GrpcException($status->details, 1);
        }

        return $result;
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
