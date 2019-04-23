<?php

namespace tests;

use Ineplant\Xml;
use PHPUnit\Framework\TestCase;

class XmlTest extends TestCase{

    public function  testXmlParse() {

        $xml = "<xml>
                    <AppId>第三方平台appid</AppId>
                    <CreateTime>1413192760</CreateTime>
                    <InfoType>unauthorized</InfoType>
                    <AuthorizerAppid>公众号appid</AuthorizerAppid>
                </xml>";

        $result = Xml::parse($xml);

        $this->assertEquals($result->AppId, "第三方平台appid");
    }

}