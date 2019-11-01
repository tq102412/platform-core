<?php


namespace Ineplant\Rpc;

use Member\GetByMemberUnionIds;
use Member\MembersHyprfClient;

class GrpcHyperfMember extends GrpcHyperClient {

    protected static function getServAddName(): string {
        return 'member-service:8080';
    }

    protected static function getClientName() {
        return MembersHyprfClient::class;
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

        return self::getClient()->GetListByUnionId($request);
    }

}