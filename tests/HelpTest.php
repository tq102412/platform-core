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

}