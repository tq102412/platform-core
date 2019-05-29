<?php

namespace Ineplant;

use GuzzleHttp\Pool;
use Ineplant\Rpc\PlatformMaterial;
use Ineplant\Rpc\WechatBasic;
use Ineplant\Rpc\WechatMedia;

class SyncWechatImage {


    /**
     * @var string
     */
    private $appid;

    /**
     * @var array
     */
    protected $paths = [];

    /**
     * @var int // 1 永久，0 临时
     */
    protected $isTemp = 1;


    /**
     * SyncWechatImage constructor.
     *
     * @param $appid
     */
    public function __construct($appid) {
        $this->appid = $appid;
    }


    /**
     * 添加任务
     *
     * @param $path
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($path) {

        $materialResponse = PlatformMaterial::getByPath(urlencode($path));

        $material = \GuzzleHttp\json_encode(
            $materialResponse->getBody()->getContents(),
            true
        );

        $this->paths[$path] = $material['wechat_material'] ?? '';

    }

    /**
     * 处理任务
     */
    public function handler() {

        $client = WechatBasic::getClient();

        $paths = [];

        $requests = function () use ($client, &$paths) {
            foreach ($this->paths as $key => $path) {
                if (empty($path)) {
                    yield function() use ($key, $client){
                        if ($this->isTemp) {
                            return WechatMedia::getMediaRequest($this->appid, $key, $client);
                        } else {
                            return WechatMedia::getUploadRequest($this->appid, $key, $client);
                        }
                    };
                }
            }
        };

        foreach ($this->paths as $key => $path) {
            if (empty($path)) {
                $paths[] = $key;
            }
        }

        $pool = new Pool($client, $requests(), [
            'concurrency' => count($this->paths),
            'fulfilled' => function($response, $index) use (&$paths) {
                $this->paths[$paths[$index]] = \GuzzleHttp\json_decode(
                    $response->getBody()->getContents(),
                    true
                );
            },
            'rejected'  => function() {
                throw new InePlantLogicException('网络错误', 1);
            }
        ]);

        $pool->promise()->wait();

        return $this->paths;
    }


    /**
     * @param $isTemp
     */
    public function setTime($isTemp) {
        $this->isTemp = $isTemp;
    }

}