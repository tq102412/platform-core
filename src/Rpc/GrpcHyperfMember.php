<?php


namespace Ineplant\Rpc;

use Member\GetByMemberUnionIds;
use Member\MembersHyprfClient;

class GrpcHyperfMember {

    /**
     * @return MembersHyprfClient|mixed
     */
    protected static function getClient() {
        return new MembersHyprfClient('member-service:8080', [
            'credentials' => null,
        ]);
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