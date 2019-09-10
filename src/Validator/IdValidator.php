<?php


namespace Ineplant\Validator;


use Ineplant\Enum\ErrorCode;

/**
 * 简单的id验证
 * Class IdValidator
 *
 * @package Ineplant\Validator
 */
class IdValidator extends BaseValidate {
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    protected $message = [
        'id' => '10001'
    ];
}