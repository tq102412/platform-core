<?php

namespace Ineplant;

use Closure;
use Firebase\JWT\JWT;

class ResolveIdToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $companyId = $request->header("HTTP_COMPANYID");
        $subject = $request->header("HTTP_SUBJECT");

        $request->attributes->add(compact($companyId, $subject));

        return $next($request);

    }
}