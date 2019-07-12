<?php

namespace Ineplant\Rpc;

use Protoc\GetByMemberUnionIds;
use Protoc\GetByUnionIdRequest;
use Protoc\GetRequest;
use Protoc\MemberClient;

class GrpcMember extends GrpcClient {

    protected static function getClientName() {
        return MemberClient::class;
    }

    protected static function getServAddName(): string {
        return 'member-service:8080';
    }

    /**
     * 获取会员信息通过union_id
     *
     * @param array $unionIds
     * @return mixed
     */
    protected static function getListByUnionIds(array $unionIds) {
        $request = new GetByMemberUnionIds();

        $request->setUnionIds($unionIds);

        return self::getClient()->GetListByUnionId($request)->wait();
    }


    /**
     * 获取会员信息通过nickname
     *
     * @param $nickName
     * @return mixed
     */
    protected static function getByNickname($nickName) {
        $request = new GetRequest();

        $request->setNickname($nickName);

        return self::getClient()->Get($request)->wait();
    }

}