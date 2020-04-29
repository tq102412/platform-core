<?php

namespace Ineplant\Rpc;

use Illuminate\Support\Facades\Log;
use Ineplant\Enum\ErrorCode;
use Ineplant\Exceptions\ReturnException;
use Ineplant\Helper;

class WechatMedia extends WechatBasic {

    /**
     * @param $appId
     * @param $path
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function uploadImage($appId, $path) {
        return self::getMediaRequest($appId, $path)->wait();
    }


    /**
     * @param $appId
     * @param $path
     * @param null $client
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public static function getMediaRequest($appId, $path, $client = null) {

        $client = $client ?? self::getClient();

        return $client->requestAsync('POST', "/api/media/up_image", [
            'json' => [
                'path'  => $path,
                'appId' => $appId
            ]
        ]);
    }


    /**
     * @param $appId
     * @param $path
     * @param string $type
     * @return mixed
     */
    public static function upload($appId, $path, $type = 'image') {
        return self::getUploadRequest($appId, $path, $type)->wait();
    }


    /**
     * @param $appId
     * @param $path
     * @param string $type
     * @param null $client
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public static function getUploadRequest($appId, $path, $type = 'image', $client = null) {
        $client = $client ?? self::getClient();

        return $client->requestAsync('POST', "/api/media/upload", [
            'json' => [
                'type'  => $type,
                'path'  => $path,
                'appId' => $appId
            ]
        ]);
    }

    /**
     * @param $activityId
     * @param $customName
     * @param $companyId
     * @return mixed
     * @throws ReturnException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function actNewsUrl($activityId, $customName, $companyId) {
        $response = self::getClient()->request('post', '/api/wx/activity/news_url', [
            'json' => [
                'activity_id' => $activityId,
                'custom_name' => $customName,
                'company_id'  => $companyId
            ]
        ]);

        $response = Helper::getForJsonResponse($response);
        if (!array_key_exists('errcode', $response) || $response['errcode']) {
            Log::error($response);
            throw new ReturnException("上传获取图文信息失败", ErrorCode::RPC);
        }
        return $response['content'];
    }


}