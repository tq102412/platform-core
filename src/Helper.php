<?php

namespace Ineplant;

class Helper {

    /**
     * @return string
     * @throws \Exception
     */
    public static function createOrderNo() {
       /* $date = date('Ymd');
        $microsecond = str_split(substr(uniqid(), 7, 13), 1);
        $microsecond = implode(NULL,array_map('ord', $microsecond));
        $microsecondInteger = substr($microsecond, 0, 8);

        return $date . $microsecondInteger . mt_rand(10000, 99999);*/

        $dataCenterId = mt_rand(0, 31);
        $snowFlake = new SnowFlake($dataCenterId, 0);

        return $snowFlake->generateID();
    }

    /**
     * @return string
     */
    public static function getProtocol() {
        return isset($_SERVER ['HTTPS']) && $_SERVER ['HTTPS'] == 'on' ? 'https://' : 'http://';
    }

    public static function pageParam()
    {
        return [(int)request('offset', 0), (int)request('limit', 20)];
    }

}