<?php


namespace Appserv;


use Hyperf\GrpcClient\BaseClient;

class AppServHyperfClient extends BaseClient {
    /**
     * 商户应用使用量扣除
     *
     * @param ChangeRequest $argument
     * @return array|\Google\Protobuf\Internal\Message[]|\Grpc\StringifyAble[]|\swoole_http2_response[]
     */
    public function Consuming(ChangeRequest $argument) {
        return $this->simpleRequest(
            '/appserv.AppServ/Consuming',
            $argument,
            [DefaultResp::class, 'decode']
        );
    }

    /**
     * @param \Appserv\ChangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Add(ChangeRequest $argument,
                        $metadata = [], $options = []) {
        return $this->simpleRequest(
            '/appserv.AppServ/Add',
            $argument,
            [DefaultResp::class, 'decode']
        );
    }
}