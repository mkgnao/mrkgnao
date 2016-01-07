<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Util;
use App\Models\TwCoupling as TwCoupling;

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

        \Log::info($urlComp);

        if (count($urlComp) > 2) {
            if ($urlComp[0] == "u") {
                $id = Util::idStrip($urlComp[1]);
                if ($id != \Auth::id()) {
                    if (count($urlComp) > 3 && $urlComp[3] == "public") {
                        $tw_coupling = TwCoupling::find($id);
                        if (!$tw_coupling) {
                            abort(400, 'could not find '.$id);
                        } else {
                            return redirect()->intended('/');
                        }
                    } else {
                        return response('unauthorized.', 401);
                    }
                }
            }
        }
    }
}
