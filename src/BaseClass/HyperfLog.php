<?php


namespace Ineplant\BaseClass;

use Hyperf\Utils\ApplicationContext;

/**
 * Class HyperfLog
 * @method static error($message, array $context = array())
 * @method static info($message, array $context = array())
 * @method static debug($message, array $context = array())
 *
 * @package Ineplant\BaseClass
 */
class HyperfLog {
    /**
     * @param string $name
     * @return \Psr\Log\LoggerInterface
     */
    public static function get(string $name = 'app')
    {
        return ApplicationContext::getContainer()->get(\Hyperf\Logger\LoggerFactory::class)->get($name);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments) {
        return self::get()->$name(...$arguments);
    }
}