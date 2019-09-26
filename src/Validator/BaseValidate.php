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
            // 场景检测
            if (!empty($this->only) && !in_array($key, $this->only)) {
                continue;
            }
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

    /**
     * uuid 验证
     * @param $value
     * @return bool|string
     */
    protected function uuid($value) {
        return '00000000-0000-0000-0000-000000000000' != $value &&
            preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i', $value) ?
            true : ':attribute格式错误';
    }

    /**
     * 都返回true
     * @param $value
     * @return bool
     */
    protected function noting($value) {
        return true;
    }
}