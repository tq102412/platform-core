<?php

namespace Ineplant;

use Closure;
use Firebase\JWT\JWT;

class ResolveIdToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $companyId = $request->header('companyId');
        $subject   = $request->header('subject');
        $followId  = $request->header('followId');
        $request->attributes->add(compact('companyId', 'subject', 'followId'));

        return $next($request);
    }
}