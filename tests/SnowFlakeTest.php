<?php

namespace tests;

use Ineplant\SnowFlake;
use PHPUnit\Framework\TestCase;

class SnowFlakeTest extends TestCase{

    public function testGenerateID() {
        $dataCenterId = mt_rand(0, 31);
        $snowFlake = new SnowFlake($dataCenterId, 0);

        $this->assertNotEmpty($snowFlake->generateID());
    }

}