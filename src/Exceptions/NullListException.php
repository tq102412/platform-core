<?php


namespace Ineplant\Exceptions;


use Ineplant\Helper;

class NullListException extends ReturnException {
    /**
     * NullListException constructor.
     * 空列表返回
     *
     */
    public function __construct() {
        parent::__construct(Helper::listRes(0, []));
    }
}