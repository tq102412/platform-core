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

        $companyId = $request->header("companyid");
        $subject = $request->header("subject");
        $request->attributes->add(compact("companyId", "subject"));

        return $next($request);

    }
}