<?php

namespace Ineplant\Middleware;

use Closure;
use Ineplant\Rpc\Platform;

class TextAntiSpam {

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ErrCodeException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public function handle($request, Closure $next) {
        if ('POST' == $request->method()) {
            Platform::textAntiSpam($request->getContent());
        }

        return $next($request);
    }
}