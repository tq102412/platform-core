<?php

namespace Ineplant\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
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
        $response = $next($request);

        $code = $response->getStatusCode();

        if (200 == $code) {
            $companyId = $request->get("companyId") ?? $request->input('company_id');

            if ($companyId) {
                try{
                    ValidateAppServer::validate($appId, $companyId, 1);
                } catch (PurchaseExpiredException $expiredException) {
                    if ($response instanceof JsonResponse) {
                        $content = (array) $response->getData();
                        $content['errcode'] =  "{$expiredException->getCode()}";
                        $content['errmsg'] = $appId;

                        $response = response($content);
                    }
                }
            }
        }

        return $response;
    }


}