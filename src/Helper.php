<?php

namespace Ineplant;

class Helper {

    /**
     * @return string
     * @throws \Exception
     */
    public static function createOrderNo() {
        $dataCenterId = mt_rand(0, 31);
        $snowFlake    = new SnowFlake($dataCenterId, 0);

        return $snowFlake->generateID();
    }

    /**
     * @return string
     */
    public static function getProtocol() {
        return isset($_SERVER ['HTTPS']) && $_SERVER ['HTTPS'] == 'on' ? 'https://' : 'http://';
    }

    /**
     * 统一获取分页参数
     *
     * @return array
     */
    public static function pageParam() {
        return [(int)request('offset', 0), (int)request('limit', 20)];
    }

    /**
     * 统一的分页列表返回格式
     *
     * @param $total
     * @param $data
     * @return array
     */
    public static function listRes($total, $data) {
        return [
            'total' => $total,
            'data'  => $data
        ];
    }

    /**
     * 保留小数并且进一
     *
     * @param $val
     * @param $num
     * @return float|int
     */
    public static function ceil($val, $num) {
        $n = 1;
        for ($i = 0; $i < $num; $i++) {
            $n *= 10;
        }

        return ceil($val * $n) / $n;
    }

    /**
     * 批量 元转化为分
     * ArrYuanToFen($arr);  //全部转化
     * ArrYuanToFen($arr, $key1, $key2); //指定要转化的key
     *
     * @param array $arr
     * @param mixed ...$keys 指定要转化的key
     * @return mixed
     */
    public static function arrYuanToFen($arr, ...$keys) {
        if (!$keys) {
            foreach ($arr as &$value) {
                $value = self::yuanToFen($value);
            }
        } else {
            foreach ($keys as $key) {
                $arr[$key] = self::yuanToFen($arr[$key]);
            }
        }
        return $arr;
    }

    /**
     * 元转化为分
     *
     * @param $yuan
     * @return float
     */
    public static function yuanToFen($yuan) {
        return (int)round(100 * $yuan);
    }

    /**
     * 是否成功
     *
     * @param double $successRate 成功率 (0.0001 ~ 1)
     * @return bool
     */
    public static function isSuccess($successRate) {
        return mt_rand(1, 10000) <= round(10000 * $successRate);
    }

    /**
     * 以数量为权重 抽奖
     *
     * @param array $idNumArr
     * [
     *   'id1'=> 1000,
     *   'id2'=> 100,
     *   'id3'=> 10,
     *   'id4' => 1
     * ]
     * @return string mixed
     */
    public static function drawByNum($idNumArr) {
        $allNum = array_sum($idNumArr);

        foreach ($idNumArr as $key => $proCur) {
            if (mt_rand(1, $allNum) <= $proCur) {
                return $key;
            }
            $allNum -= $proCur;
        }

        return null;
    }

    /**
     * swoole中禁用exit,dd的代替方法
     *
     * @param mixed ...$data
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function dd(...$data) {
        array_walk_recursive($data, function ($item) {
            if (is_callable([$item, 'toArray'])) {
                $item = $item->toArray();
            }
            return $item;
        });

        throw new \Ineplant\Exceptions\ReturnException($data);
    }
}