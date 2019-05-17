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

        $env = getenv("SERVICE_ENV");

        $domain = self::$domain;

        if (!empty($env)) {
            $protocol = 'https://';

            if (false == strpos($domain, 'https://')) {
                $protocol = 'http://';
            }

            $domain = str_replace($protocol,$protocol . $env . "-", $domain);
        }

        empty(self::$client) && self::$client = new Client([
            'base_uri' => $domain
        ]);

        return self::$client;
    }

}