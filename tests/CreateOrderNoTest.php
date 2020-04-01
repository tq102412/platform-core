<?php

namespace tests;

use Ineplant\Helper;
use Ineplant\SnowFlake;
use PHPUnit\Framework\TestCase;

class CreateOrderNoTest extends TestCase{

    public function testCreateOrderNo() {
        $data = [];

        for ($i = 0; $i < 100000; $i++) {
            $data[] = Helper::createOrderNo();
        }

        $count = count($data);
        $count2 = count(array_unique($data));

        $this->assertEquals($count, $count2);
    }


}