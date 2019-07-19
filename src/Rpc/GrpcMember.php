<?php

namespace Ineplant\Rpc;

use Protoc\GetByMemberUnionIds;
use Protoc\GetRequest;
use Protoc\MemberClient;

class GrpcMember extends GrpcClient {

    /**
     * @var 客户端实例
     */
    protected static $client;

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
    public static function getListByUnionIds(array $unionIds) {
        $request = new GetByMemberUnionIds();

        $request->setUnionIds($unionIds);

        return self::getClient()->GetListByUnionId($request)->wait();
    }

    /**
     * 获取会员信息通过nickname和公司id
     *
     * @param $followIds
     * @param $companyId
     * @param $nickName
     * @return mixed
     */
    public static function getList($followIds,  $companyId = '', $nickName = '') {
        $request = new GetRequest();

        $request->setNickname($nickName);
        $request->setCompanyId($companyId);
        $request->setFollowIds($followIds);

        return self::getClient()->Get($request)->wait();
    }

}