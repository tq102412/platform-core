<?php

namespace Ineplant\Rpc;

use GuzzleHttp\Client;

trait BaseRpc {

    /**
     * @var Client
     */
    protected static $client;

    /**
     * @return Client
     */
    public static function getClient() {
        empty(self::$client) && self::$client = new Client([
            'base_uri' => self::$domain
        ]);

        return self::$client;
    }

}