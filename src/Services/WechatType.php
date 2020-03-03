<?php

namespace Ineplant\Services;

use Ineplant\Exceptions\WechatNotVerifyServiceTypeException;

class WechatType {

    /**
     * @var int 公众号认证类型，对比微信文档
     */
    protected $verifyType;

    /**
     * @var int 公众号类型，对比微信文档，2是服务号，1是公众号
     */
    protected $type;

    /**
     * WechatType constructor.
     */
    public function __construct($type, $verifyType) {
        $this->verifyType = $verifyType;
        $this->type       = $type;
    }

    /**
     * 是否服务号
     *
     * @return bool
     */
    public function isServiceType() {
        return 2 == $this->type;
    }


    /**
     * 是否认证服务号
     *
     * @return bool
     */
    public function isVerifyServiceType() {
        return $this->isServiceType() && $this->isVerify();
    }

    /**
     * @throws WechatNotVerifyServiceTypeException
     */
    public function isVerifyServiceTypeOrFail() {
        if (!$this->isVerifyServiceType()) {
            throw new WechatNotVerifyServiceTypeException();
        }
    }


    /**
     * 获取公众号是否认证
     *
     * @return bool
     */
    public function isVerify() {
        return -1 != $this->verifyType;
    }


}