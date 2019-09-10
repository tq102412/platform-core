<?php


namespace Ineplant\Validator;


use think\Validate;

class BaseValidate extends Validate {

    /**
     * 根据验证器规则获取请求参数(如果只有一个规则,直接返回值 否则返回关联数据)
     *
     * @param array $input
     *
     * @return array|mixed
     */
    public function getDataByRule($input) {
        $data = [];

        foreach ($this->rule as $key => $value) {
            //$key为'name|姓名'这种形式时,只取|前的值
            $end        = strpos($key, '|');
            $key        = false === $end ? $key : substr($key, 0, $end);
            $data[$key] = $input[$key] ?? null;
        }

        return 1 == count($data) ? reset($data) : $data;
    }

    /**
     * 正整数验证规则
     * @param $value
     * @return bool|string
     */
    protected function isPositiveInteger($value) {
        return (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) ?
            true : ':attribute只能是正整数';
    }
}