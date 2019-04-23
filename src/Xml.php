<?php

namespace Ineplant;

use Closure;
use Firebase\JWT\JWT;

class Xml {

    /**
     * 解析xml
     *
     * @param $xml
     * @return mixed
     */
    public static function parse($xml) {
        $backup = libxml_disable_entity_loader(true);

        $result = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_NOCDATA | LIBXML_NOBLANKS);

        libxml_disable_entity_loader($backup);

        return $result;
    }

}