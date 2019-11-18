<?php

namespace Ineplant;

use Ineplant\Exceptions\PurchaseExpiredException;
use Ineplant\Rpc\GrpcAppServ;

class ValidateAppServer {

    /**
     * 验证应用是否可用
     *
     * @param int $appId
     * @param string $companyId
     * @param int $quantity
     * @throws PurchaseExpiredException
     */
    public static function validate($appId = 0, $companyId = '', $quantity = 1) {
        list($errCode, $message) = GrpcAppServ::Validate($appId, $companyId, $quantity);

        if ($errCode) {
            throw new PurchaseExpiredException($appId);
        }
    }

}