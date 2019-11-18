<?php

namespace Ineplant\Middleware;

use Closure;
use Illuminate\Http\Request;
use Ineplant\Enum\AppType;
use Ineplant\Exceptions\PurchaseExpiredException;
use Ineplant\ValidateAppServer;

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
            ValidateAppServer::validate($appId, $companyId, 1);
        }

        return $next($request);
    }


}