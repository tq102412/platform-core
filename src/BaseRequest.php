<?php
/**
 * Created by PhpStorm.
 * User: 我不吃植物
 * Date: 2018/8/14
 * Time: 下午6:53
 */

namespace Ineplant;


use Illuminate\Foundation\Http\FormRequest;
use Ineplant\BaseClass\RequestTrait;


class BaseRequest extends FormRequest {

    use RequestTrait;

    /**
     * @var array 错误码映射
     */
    protected $maps;

}
