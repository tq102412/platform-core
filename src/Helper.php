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

}