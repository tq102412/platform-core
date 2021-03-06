<?php


namespace Ineplant\Rpc;


use Ineplant\Enum\ErrorCode;
use Ineplant\Exceptions\ReturnException;

abstract class GrpcHyperClient {
    /**
     * @return mixed
     */
    final public static function getClient() {
        $app = static::getClientName();

        return new $app(
            static::getServAdd(),
            ['credentials' => null]
        );
    }

    /**
     * @param $response
     * @return mixed
     * @throws ReturnException
     */
    public static function getOrFail($response) {
        list($res, $status) =  $response;
        if (is_null($res)) {
            throw new ReturnException($status->details, ErrorCode::RPC);
        }
        return $res;
    }

    /**
     * 获取服务地址(添加环境信息)
     *
     * @return string
     */
    private static function getServAdd() {
        $env = getenv("SERVICE_ENV");
        return ($env ? "$env-" : '') . static::getServAddName();
    }

    /**
     * rpc服务地址
     * exp return coupon:8080
     *
     * @return string
     */
    abstract protected static function getServAddName(): string;

    /**
     * grpc Client
     * exp return AppClient::class
     *
     * @return string
     */
    abstract protected static function getClientName();

}