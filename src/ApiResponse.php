<?php

namespace Ineplant;

use Psr\Http\Message\ResponseInterface;

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
     * @param int $errcode
     * @return array
     */
    public static function handler($response = '', $errorCode = '0'){

        if( $response instanceof ResponseInterface ){

            $content = $response->getBody()->getContents();

            if (empty($content)){
                $jsonResult = '未知异常！';
            } else {
                $jsonResult = json_decode($content, true);

                if( null === $jsonResult ){
                    $jsonResult = $content;
                }
            }

            $responseData = 200 != $response->getStatusCode() ?
                [
                    'errcode' => ErrorCode::SYSTEM_FAIL,
                    'errmsg' => $jsonResult,
                    'content' => ''
                ] :
                [
                    'errcode' => ErrorCode::NOT_ERROR,
                    'errmsg' => '',
                    'content' => $jsonResult
                ];

        }else{


            $responseData = '0' != $errorCode ?
                [
                    'errcode' => $errorCode,
                    'errmsg' => empty($response) ? ErrorCode::ERROR_MESSAGE[$errorCode] : $response,
                    'content' => ''
                ] :
                [
                    'errcode' => $errorCode,
                    'errmsg' => '',
                    'content' => $response
                ];
        }

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