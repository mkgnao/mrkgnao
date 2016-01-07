<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        self::abortIfIdNotMatched($request);

        return $next($request);
    }

    private function abortIfIdNotMatched($request)
    {
        $url = $request->path();

        $urlComp = explode("/", parse_url($url, PHP_URL_PATH));

        if (count($urlComp) > 2) {
            if ($urlComp[0] == "u") {
                $id = Util::idStrip($urlComp[1]);
                if ($id != \Auth::id()) {
                    abort(403, 'unauthorized action');
                }
            }
        }
    }
}
