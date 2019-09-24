<?php

namespace tests;

use Ineplant\Helper;
use Ineplant\SnowFlake;
use PHPUnit\Framework\TestCase;

class HelpTest extends TestCase{

    public function testCeil() {

        $v = 123.33333;
        $this->assertEquals(Helper::ceil($v, 0), 124);
        $this->assertEquals(Helper::ceil($v, 1), 123.4);
        $this->assertEquals(Helper::ceil($v, 2), 123.34);
        $this->assertEquals(Helper::ceil($v, 3), 123.334);
        $this->assertEquals(Helper::ceil($v, 4), 123.3334);
        $this->assertEquals(Helper::ceil($v, 5), 123.33333);
        $this->assertEquals(Helper::ceil($v, 6), 123.333330);

    }

    public function testUrlAddParam() {
        $baseUrl = 'http://baidu.com?a=1';
        $baseUrl2 = 'http://baidu.com?';
        $baseUrl3 = 'http://baidu.com';
        $baseUrl4 = 'http://baidu.com?a=1&b=5';
        $baseUrl5 = 'http://baidu.com/#/?app_id=12438910&zsdk=932849';

        $data = [
            'test' => "asdsads"
        ];

        $data2 = "test=asdsads";

        $this->assertEquals(Helper::urlAddParam($baseUrl, $data), "http://baidu.com?a=1&test=asdsads");
        $this->assertEquals(Helper::urlAddParam($baseUrl, $data2), "http://baidu.com?a=1&test=asdsads");
        $this->assertEquals(Helper::urlAddParam($baseUrl2, $data), "http://baidu.com?test=asdsads");
        $this->assertEquals(Helper::urlAddParam($baseUrl2, $data2), "http://baidu.com?test=asdsads");
        $this->assertEquals(Helper::urlAddParam($baseUrl3, $data), "http://baidu.com?test=asdsads");
        $this->assertEquals(Helper::urlAddParam($baseUrl3, $data2), "http://baidu.com?test=asdsads");
        $this->assertEquals(Helper::urlAddParam($baseUrl4, $data), "http://baidu.com?a=1&b=5&test=asdsads");
        $this->assertEquals(Helper::urlAddParam($baseUrl4, $data2), "http://baidu.com?a=1&b=5&test=asdsads");
        $this->assertEquals(Helper::urlAddParam($baseUrl5, $data), "http://baidu.com/#/?app_id=12438910&zsdk=932849&test=asdsads");
        $this->assertEquals(Helper::urlAddParam($baseUrl5, $data2), "http://baidu.com/#/?app_id=12438910&zsdk=932849&test=asdsads");
    }

    public function testGetOutByKeys() {
        $arr = ['a' => 'test1', 'b' => 'test2', 'c' => 'test3'];

        $this->assertEquals(Helper::getOutByKeys($arr, 'b'), ['a' => 'test1', 'c' => 'test3']);
        $this->assertEquals(Helper::getOutByKeys($arr, 'c'), 'test1');
    }
}