<?php


namespace Member;


use Hyperf\GrpcClient\BaseClient;

class MembersHyprfClient extends BaseClient {
    /**
     * memberIds查询用户
     *
     * @param GetByMemberUnionIds $argument
     * @return array|\Google\Protobuf\Internal\Message[]|\Grpc\StringifyAble[]|\swoole_http2_response[]
     */
    public function GetListByUnionId(GetByMemberUnionIds $argument) {
        return $this->simpleRequest(
            '/member.Members/GetListByUnionId',
            $argument,
            [MembersResult::class, 'decode']
        );
    }
}