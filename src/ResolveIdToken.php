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

        if (!$request->hasHeader("id-token")) {
            return response('id token is empty', 400);
        }

        $idToken = $request->header("id-token");

        $identity = JWT::decode($idToken);

        $request->attributes->add([
            'identity' => $identity
        ]);

        return $next($request);
    }
}