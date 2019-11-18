<?php
/**
 * Created by PhpStorm.
 * User: 喜胖装机
 * Date: 2019/7/1
 * Time: 15:04
 */

namespace Ineplant\Exceptions;


use Ineplant\ApiResponse;
use Ineplant\Enum\ErrorCode;

class ReturnException extends \Exception {
    protected $content;

    /**
     * ReturnException constructor.
     *
     * @param $content
     * @param int $errCode
     */
    public function __construct($content, $errCode = ErrorCode::NOT_ERROR) {
        $this->content = $content;

        $this->code    = $errCode;
        $this->message = $errCode ? $content : '';
    }


    /**
     * 异常处理
     *
     * @return array
     */
    public function render() {
        return ApiResponse::handler($this->content, $this->code);
    }

    /**
     * @param $name
     * @return int
     */
    public function __get($name) {
        if ($name == 'errCode') {
            return $this->code;
        }
    }
}