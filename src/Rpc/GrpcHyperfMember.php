<?php


namespace Ineplant\Rpc;

use Member\MembersHyprfClient;

class GrpcHyperfMember extends GrpcMember {

    /**
     * @return string
     */
    protected static function getClientName() {
        return MembersHyprfClient::class;
    }
}