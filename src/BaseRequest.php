<?php
/**
 * Created by PhpStorm.
 * User: 我不吃植物
 * Date: 2018/8/14
 * Time: 下午6:53
 */

namespace Ineplant;

use App\Exceptions\InePlantLogicException;
use App\Services\ErrorCode;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{

    /**
     * @var array 错误码映射
     */
    protected $maps;


    /**
     * 重写验证失败时的异常抛出
     *
     * @param Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator){

        throw new ValidationException($validator,response(
            $this->formatErrors($validator)));

    }


    /**
     * 格式化输出错误消息
     *
     * @param Validator $validator
     * @return array
     */
    protected function formatErrors(Validator $validator){

        //$message = $messages = $validator->errors()->all();

        $code = '400';

//        foreach ($messages as $v){
//
//            if( isset($this->maps[$v]) ){
//                $code = $this->maps[$v];
//                $message = $v;
//                break;
//            }
//        }

        $result = [
            'errcode' => $code,
            //'errmsg' => $message,
            'errmsg' => '参数错误',
            'content' => ''
        ];

        return $result;

    }

}
