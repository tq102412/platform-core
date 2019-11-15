<?php

namespace Ineplant\Middleware;

use Closure;
use Illuminate\Http\Request;
use Ineplant\Enum\AppType;
use Ineplant\Exceptions\PurchaseExpiredException;
use Ineplant\Rpc\GrpcAppServ;

class AppValidate {

    /**
     * @param Request $request
     * @param Closure $next
     * @param int $appId
     * @return mixed
     * @throws PurchaseExpiredException
     */
    public function handle($request, Closure $next, $appId = AppType::TEMPLATE_MSG_QUANTITY) {

        $companyId = $request->get("companyId") ?? $request->input('company_id');

        if ($companyId) {
            list($errCode, $message) = GrpcAppServ::Validate($appId, $companyId, 1);

            if ($errCode) {
                throw new PurchaseExpiredException($appId);
            }
        }

        return $next($request);
    }


}