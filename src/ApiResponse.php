<?php

namespace Ineplant;

final class ApiResponse {

    protected static $errorMessage = [];

    /**
     * ApiResponse constructor. 禁止初始化
     */
    private function __construct()
    {

    }

    /**
     * 设置错误消息映射
     *
     * @param array $errorMessage
     */
    public static function setErrorMessage(array $errorMessage) {
        self::$errorMessage = $errorMessage;
    }


    /**
     * 处理api返回数据格式
     *
     * @param mixed $response
     * @param int $errcode
     * @return array
     */
    public static function handler($response = '', $errorCode = '0'){

        $responseData = '0' != $errorCode ?
            [
                'errcode' => $errorCode,
                'errmsg' => empty($response) ? self::$errorMessage[$errorCode] : $response,
                'content' => ''
            ] :
            [
                'errcode' => $errorCode,
                'errmsg' => '',
                'content' => $response
            ];

        return $responseData;

    }


    /**
     * 禁止克隆
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

}