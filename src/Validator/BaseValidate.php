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
        $keys = array_unique(
            array_map(
                function ($key) {
                    if (strpos($key, '|')) {
                        $key = explode('|', $key)[0];
                    }
                    return strpos($key, '.') ? explode('.', $key)[0] : $key;
                }, array_keys($this->rule))
        );

        $data = [];
        foreach ($keys as $key) {
            $data[$key] = $input[$key] ?? null;
        }

        return 1 == count($data) ? reset($data) : $data;
    }

    /**
     * 正整数验证规则
     *
     * @param $value
     * @return bool|string
     */
    protected function isPositiveInteger($value) {
        return (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) ?
            true : ':attribute只能是正整数';
    }
}