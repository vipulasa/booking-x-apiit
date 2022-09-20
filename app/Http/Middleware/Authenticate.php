<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // put the URI to the session to be used later to redirect the user back to the original page
        $request->session()->put('url_redirect', $request->url());

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
