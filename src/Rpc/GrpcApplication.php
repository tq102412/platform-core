<?php


namespace Ineplant\Rpc;


use Application\ApplicationClient;
use Application\Order;
use Application\PayOrder;
use Application\User;

class GrpcApplication extends GrpcHyperClient {

    protected static function getServAddName(): string {
        return "application:9503";
    }

    protected static function getClientName() {
        return ApplicationClient::class;
    }

    /**
     * 应用订单支付回调
     *
     * @param $orderNo
     * @param $totalMoney
     * @return mixed
     */
    public static function handleNotify($orderNo, $totalMoney) {
        $request = new Order();
        $request->setOrderno($orderNo);
        $request->setTotalMoney($totalMoney);

        list($reply, $status) = self::getClient()->appOrderNotify($request);
        return $reply->getStatus();
    }

    /**
     * 试用套餐发放
     *
     * @param $clientId
     * @param $companyId
     * @return mixed
     */
    public static function trialSend($clientId, $companyId) {
        $request = new User();
        $request->setClientId($clientId);
        $request->setCompanyId($companyId);

        list($reply, $status) = self::getClient()->trialSend($request);
        return $reply->getStatus();
    }

    /**
     * @param $orderNo
     * @return array
     */
    public static function getOrder($orderNo) {
        $request = new PayOrder();
        $request->setOrderno($orderNo);

        list($order, $status) = self::getClient()->getOrder($request);
        return self::orderToArr($order);
    }

    /**
     * @param $orderData
     * @return PayOrder
     */
    public static function creOrder($orderData) {
        $order = new PayOrder();
        $order->setOrderno($orderData['orderno']);
        $order->setName($orderData['name']);
        $order->setCompanyId($orderData['company_id']);
        $order->setPrice($orderData['price']);
        $order->setPayMode($orderData['pay_mode']);
        $order->setType($orderData['type']);
        key_exists('charging_model_id', $orderData) && $order->setChargingModelId($orderData['charging_model_id']);
        key_exists('created_user_id', $orderData) && $order->setCreatedUserId($orderData['created_user_id']);
        key_exists('package_id', $orderData) && $order->setPackageId($orderData['package_id']);
        key_exists('payload', $orderData) && $order->setPayload($orderData['payload']);
        return $order;
    }

    /**
     * @param PayOrder $order
     * @return array
     */
    public static function orderToArr(PayOrder $order) {
        return [
            'orderno'           => $order->getOrderno(),
            'name'              => $order->getName(),
            'company_id'        => $order->getCompanyId(),
            'price'             => $order->getPrice(),
            'charging_model_id' => $order->getChargingModelId(),
            'pay_mode'          => $order->getPayMode(),
            'type'              => $order->getType(),
            'created_user_id'   => $order->getCreatedUserId(),
            'package_id'        => $order->getPackageId(),
            'payload'           => $order->getPayload()
        ];
    }
}