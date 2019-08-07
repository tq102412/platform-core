<?php

namespace Ineplant;

use Ineplant\Enum\ErrorCode;

final class ApiResponse {

    /**
     * ApiResponse constructor. 禁止初始化
     */
    private function __construct()
    {

    }


    /**
     * 处理api返回数据格式
     *
     * @param mixed $response
     * @param int $errorCode
     * @return array
     */
    public static function handler($response = '', $errorCode = 0){
        $responseData = 0 != $errorCode ?
            [
                'errcode' => "$errorCode",
                'errmsg' => $response ?: ErrorCode::toString($errorCode),
                'content' => ''
            ] :
            [
                'errcode' => "$errorCode",
                'errmsg' => '',
                'content' => $response
            ];

        return $responseData;
    }

    /**
     * 输出json格式，通过状态码自动匹配错误信息
     *
     * @param $errCode
     * @param string $msg
     * @return array
     */
    public static function out($errCode, $msg = '') {
        return self::handler($msg, $errCode);
    }

    /**
     * 列表查询没有数据时的返回
     *
     * @return array
     */
    public static function noData()
    {
        return self::handler([
            'data' => [],
            'total' => 0
        ]);
    }

    /**
     * 禁止克隆
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

}