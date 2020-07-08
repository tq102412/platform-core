<?php
namespace Ineplant\BaseClass;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait RequestTrait {

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
        $message = config('app.debug') ? $messages = $validator->errors()->all()
            : '参数错误';

        $code = '400';

        $result = [
            'errcode' => $code,
            'errmsg'  => $message,
            'content' => ''
        ];

        return $result;
    }

}