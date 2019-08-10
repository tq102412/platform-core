<?php


namespace Ineplant;


use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class CollectHandle {
    /**
     * @param Collection $list
     * @return mixed
     */
    public static function paged($list) {
        list($offset, $limit) = Helper::pageParam();
        if (-1 == $limit) {
            return $list;
        }

        return $list->slice($offset, $limit);
    }

    /**
     * 根据$rules 获取请求参数数组中的数据
     *
     * @param array $input
     * @param $rules
     * @return array|mixed
     */
    public static function extractInputFromRules($input, $rules) {
        $keys = collect($rules)->keys()->map(function ($rule) {
            return str_contains($rule, '.') ? explode('.', $rule)[0] : $rule;
        })->unique()->toArray();

        $results = [];
        foreach ($keys as $key) {
            $value = data_get($input, $key);
            Arr::set($results, $key, $value);
        }
        return 1 == count($keys) ? head($results) : $results;
    }
}