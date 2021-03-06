<?php


namespace Application;


use Hyperf\GrpcClient\BaseClient;

class ApplicationClient extends BaseClient {
    /**
     * 应用订单回调
     *
     * @param Order $order
     * @return array|\Google\Protobuf\Internal\Message[]|\Grpc\StringifyAble[]|\swoole_http2_response[]
     */
    public function appOrderNotify(Order $order) {
        return $this->simpleRequest(
            '/application.application/appOrderNotify',
            $order,
            [Result::class, 'decode']
        );
    }

    /**
     * 自动发放使用套餐
     *
     * @param User $user
     * @return array|\Google\Protobuf\Internal\Message[]|\Grpc\StringifyAble[]|\swoole_http2_response[]
     */
    public function trialSend(User $user) {
        return $this->simpleRequest(
            '/application.application/trialSend',
            $user,
            [Result::class, 'decode']
        );
    }

    /**
     * 保存订单
     *
     * @param PayOrder $order
     * @return array|\Google\Protobuf\Internal\Message[]|\swoole_http2_response[]
     */
    public function saveOrder(PayOrder $order) {
        return $this->simpleRequest(
            '/application.application/saveOrder',
            $order,
            [Result::class, 'decode']
        );
    }

    /**
     * 获取订单
     *
     * @param PayOrder $order
     * @return array|\Google\Protobuf\Internal\Message[]|\swoole_http2_response[]
     */
    public function getOrder(PayOrder $order) {
        return $this->simpleRequest(
            '/application.application/getOrder',
            $order,
            [PayOrder::class, 'decode']
        );
    }

}