<?php

namespace Ineplant;

use Faker\Factory;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Ineplant\Enum\ErrorCode;
use Ineplant\Exceptions\ReturnException;
use Ramsey\Uuid\Uuid;

class Helper {

    /**
     * @return string
     * @throws \Exception
     */
    public static function createOrderNo() {
        $dataCenterId = mt_rand(0, 31);
        $snowFlake    = new SnowFlake($dataCenterId, 0);

        return $snowFlake->generateID();
    }

    /**
     * @return string
     */
    public static function getProtocol() {
        return isset($_SERVER ['HTTPS']) && $_SERVER ['HTTPS'] == 'on' ? 'https://' : 'http://';
    }

    /**
     * 统一获取分页参数
     *
     * @return array
     */
    public static function pageParam() {
        return [(int)request('offset', 0), (int)request('limit', 20)];
    }

    /**
     * 统一的分页列表返回格式
     *
     * @param $total
     * @param $data
     * @return array
     */
    public static function listRes($total, $data) {
        return [
            'total' => $total,
            'data'  => $data
        ];
    }

    /**
     * 保留小数并且进一
     *
     * @param $val
     * @param $num
     * @return float|int
     */
    public static function ceil($val, $num) {
        $n = 1;
        for ($i = 0; $i < $num; $i++) {
            $n *= 10;
        }

        return ceil($val * $n) / $n;
    }

    /**
     * 批量 元转化为分
     * ArrYuanToFen($arr);  //全部转化
     * ArrYuanToFen($arr, $key1, $key2); //指定要转化的key
     *
     * @param array $arr
     * @param mixed ...$keys 指定要转化的key
     * @return mixed
     */
    public static function arrYuanToFen($arr, ...$keys) {
        if (!$keys) {
            foreach ($arr as &$value) {
                $value = self::yuanToFen($value);
            }
        } else {
            foreach ($keys as $key) {
                $arr[$key] = self::yuanToFen($arr[$key]);
            }
        }
        return $arr;
    }

    /**
     * 元转化为分
     *
     * @param $yuan
     * @return float
     */
    public static function yuanToFen($yuan) {
        return (int)round(100 * $yuan);
    }

    /**
     * 分转化为元
     *
     * @param $fen
     * @return string
     */
    public static function fenToYuan($fen) {
        return number_format($fen / 100, 2, '.', '');
    }

    /**
     * 是否成功
     *
     * @param double $successRate 成功率 (0.0001 ~ 1)
     * @return bool
     */
    public static function isSuccess($successRate) {
        return mt_rand(1, 10000) <= round(10000 * $successRate);
    }

    /**
     * 以数量为权重 抽奖
     *
     * @param array $idNumArr
     * [
     *   'id1'=> 1000,
     *   'id2'=> 100,
     *   'id3'=> 10,
     *   'id4' => 1
     * ]
     * @return string mixed
     */
    public static function drawByNum($idNumArr) {
        $allNum = array_sum($idNumArr);

        foreach ($idNumArr as $key => $proCur) {
            if (mt_rand(1, $allNum) <= $proCur) {
                return $key;
            }
            $allNum -= $proCur;
        }

        return null;
    }

    /**
     * swoole中禁用exit,dd的代替方法
     *
     * @param mixed ...$data
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public static function dd(...$data) {
        array_walk_recursive($data, function ($item) {
            if (is_callable([$item, 'toArray'])) {
                $item = $item->toArray();
            }
            return $item;
        });

        throw new ReturnException($data);
    }

    /**
     * 时间转化为标准格式 用于存储
     *
     * @param string $dateStr '2019-08-21T16:00:00.000Z'
     * @return false|string
     */
    public static function stdDate($dateStr) {
        return date('Y-m-d H:i:s', strtotime($dateStr));
    }

    /**
     * 时间添加固定秒数(零时区转东八区)
     *
     * @param $timeStr
     * @param string $format
     * @param float|int $incSecond
     * @return false|string
     */
    public static function timeChange($timeStr, $format = 'Y-m-d H:i:s', $incSecond = 8 * 3600) {
        return date($format, strtotime($timeStr) + $incSecond);
    }


    /**
     * @param $url
     * @param $param
     * @return string
     */
    public static function urlAddParam($url, $param) {
        if (false === strpos($url, '?')) {
            $url .= '?';
        }

        $str = '';

        if (is_array($param)) {
            foreach ($param as $key => $value) {
                $str .= "$key=$value" . '&';
            }

            $str = rtrim($str, '&');
        } else {
            $str = $param;
        }

        if ('?' == substr($url, -1)) {
            $url .= $str;
        } else {
            $url .= '&' . $str;
        }

        return $url;
    }

    /**
     * 根据key获取并删除数组的值
     *
     * @param $arrays
     * @param mixed ...$keys
     * @return array|mixed
     */
    public static function getOutByKeys(&$arrays, ...$keys) {
        $res = [];
        foreach ($keys as $key) {
            $res[$key] = $arrays[$key];
            unset($arrays[$key]);
        }
        return 1 == count($res) ? reset($res) : $res;
    }

    /**
     * @param $response
     * @param null $key
     * @return array|\ArrayAccess|mixed
     * @throws ReturnException
     */
    public static function getForJsonResponse($response, $key = null) {
        $arr = json_decode((string)$response->getBody(), true);
        if (JSON_ERROR_NONE != json_last_error()) {
            throw new ReturnException('response resolve error', ErrorCode::API);
        }
        if (!$key) {
            return $arr;
        }
        $res = Arr::get($arr, $key);
        if (is_null($res)) {
            throw new ReturnException("response resolve '$key' error", ErrorCode::API);
        }
        return $res;
    }

    /**
     * @param $response
     * @return mixed
     * @throws ReturnException
     */
    public static function HttpRpcResult($response) {
        $response = Helper::getForJsonResponse($response);

        if ($response['errcode']) {
            throw new ReturnException($response['errmsg'], ErrorCode::API);
        }

        return $response['content'];
    }

    /**
     * @param \Closure $handle
     * @param $msg
     * @return mixed
     * @throws ReturnException
     */
    public static function responseForRPC(\Closure $handle, $msg) {
        try {
            return $handle();
        } catch (\Exception $e) {
            $errMsg = $exception = $e->hasResponse()
                ? (string)$e->getResponse()->getBody() : $msg . ' 异常';
            if (strlen($exception) > 50) {
                $errMsg = $msg . '异常';
            }

            throw new ReturnException($errMsg, ErrorCode::RPC);
        }
    }

    /**
     * @param $arr
     * @param $num
     * @return array
     */
    public static function arrShift(&$arr, $num) {
        $res = [];
        for ($i = 0; $i < $num; $i++) {
            $res[] = array_shift($arr);
        }
        return $res;
    }

    /**
     * 判断是否空uuid
     *
     * @param $value
     * @return bool
     */
    public static function emptyUuid($value) {
        return empty($value) || Uuid::NIL == $value || !preg_match(
                '/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i',
                $value
            );
    }

    /**
     * 避免其他异常被handle
     *
     * @param $func
     * @return mixed
     * @throws \Exception
     */
    public static function avoidExceptionHandle($func) {
        try {
            return $func();
        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * 发布任务
     *
     * @param $s  int 执行延时秒数
     * @param $url  string 执行地址，仅当该接口返回为字符串"SUCCESS"时,视为处理完成
     * @param $data mixed  访问$url接口时携带的参数
     * @param $tags array  任务标签
     * @return bool|string $return !== true,则返回failMsg
     */
    public static function addJob($s, $url, $data = '', $tags = []) {
        try {
            $response = (new Client())->post('http://horizon/api/job', [
                'json' => compact('s', 'url', 'data', 'tags')
            ]);
            return 'SUCCESS' == (string)$response->getBody();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * 查询条件添加时间约束
     *
     * @param $fromTime
     * @param $toTime
     * @param array $condition
     * @param string $timeKey
     * @return array
     */
    public static function conditionAddTime($fromTime, $toTime, $condition = [], $timeKey = 'created_at') {
        if ($fromTime) {
            $condition[] = [$timeKey, '>=', self::stdDate($fromTime)];
        }
        if ($toTime) {
            $condition[] = [$timeKey, '<=', self::stdDate($toTime)];
        }
        return $condition;
    }

    /**
     * @param $num
     * @return array
     */
    public static function getShamUsers($num) {
        $shamUsers = [];
        for ($i = 0; $i < $num; $i++) {
            $shamUsers[] = [
                'nickname'   => self::shamName(),
                'headimgurl' => self::shamHeadImg()
            ];
        }
        return $shamUsers;
    }

    /**
     * 虚拟姓名
     *
     * @return mixed
     */
    public static function shamName() {
        return Helper::isSuccess(0.5) ? Factory::create('zh_CN')->name
            : (
            Helper::isSuccess(0.7) ? Factory::create('en_UK')->firstName
                : str_replace('.', '_', Factory::create('en_UK')->userName)
            );
    }

    /**
     * 虚拟头像
     *
     * @return string
     */
    public static function shamHeadImg() {
        return '/public/headimg/u_' . rand(100000, 101120) . '.jpg';
    }

    /**
     * 获取手续费
     *
     * @param $price
     * @param $handle
     * @return int
     * @throws ReturnException
     */
    public static function commissionByPrice($price, $handle) {
        return (int)round(($price / (1 - self::getMchRate($handle))) - $price);
    }

    /**
     * @param  $handle
     *   laravel:Redis::class
     *   hyperf:$container->get(Hyperf\Redis\Redis::class)
     * @return ReturnException|mixed
     * @throws ReturnException
     */
    public static function getMchRate($handle) {
        $mchRate = call_user_func([$handle, 'get'], 'IMPORTANT_MCH_RATE');
        if (!$mchRate) {
            throw new ReturnException('IMPORTANT_MCH_RATE GET ERROR', ErrorCode::CONFIG_ADMIN);
        }
        return $mchRate;
    }

    /**
     * 判断是否为正整数
     * @param $value
     * @return bool
     */
    public static function isPositiveInteger($value) {
        return (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0);
    }
}