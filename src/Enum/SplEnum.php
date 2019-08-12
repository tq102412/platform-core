<?php

namespace Ineplant\Enum;

/**
 * 规范化枚举基类
 *
 * User: Kyle
 * Date: 2019/7/2
 * Time: 16:04
 */
class SplEnum {
    private $val  = null;
    private $name = null;

    final public function __construct($val) {
        $list = self::getConstants();
        //禁止重复值
        if (count($list) != count(array_unique($list))) {
            $class = static::class;
            throw new \Exception("class : {$class} define duplicate value");
        }
        $this->val  = $val;
        $this->name = self::isValidValue($val);
        if ($this->name === false) {
            throw new \Exception("invalid value");
        }
    }

    /**
     * 获取枚举名
     *
     * @return string
     */
    final public function getName(): string {
        return $this->name;
    }

    /**
     * 大驼峰格式的枚举名
     *
     * @return string
     */
    public function getStudlyName() {
        return studly_case(strtolower($this->name));
    }

    /**
     * 随机获取一个枚举值
     *
     * @return mixed
     */
    public static function randomValue() {
        return array_random(self::getConstants());
    }

    /**
     * 所有值的列表
     *
     * @return array
     */
    public static function values() {
        return array_values(self::getConstants());
    }

    /**
     * 枚举值
     *
     * @return mixed
     */
    final public function getValue() {
        return $this->val;
    }

    /**
     * 是否存在枚举名
     *
     * @param string $name
     * @return bool
     */
    final public static function isValidName(string $name): bool {
        $list = self::getConstants();
        if (isset($list[$name])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 是否存在枚举值
     *
     * @param $val
     * @return false|int|string
     */
    final public static function isValidValue($val) {
        $list = self::getConstants();
        return array_search($val, $list);
    }

    /**
     * 枚举键值对列表
     *
     * @return array
     */
    final public static function getEnumList(): array {
        return self::getConstants();
    }

    private final static function getConstants(): array {
        try {
            return (new \ReflectionClass(static::class))->getConstants();
        } catch (\Throwable $throwable) {
            return [];
        }
    }

    function __toString() {
        // TODO: Implement __toString() method.
        return (string)$this->getName();
    }
}
