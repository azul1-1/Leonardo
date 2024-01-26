<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class TwoFactor
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
        $user = auth()->user();

        if(Auth::check() && $user->two_factor_code && $request->user()->verify_confirmation)
        {
            if($user->two_factor_expires_at<now()) //expired
            {
                $user->resetTwoFactorCode();
                auth()->logout();

                return redirect()->route('login')
                ->withMessage('The two factor code has expired. Please login again.');
            }

            if(!$request->is('verify*')) //prevent enless loop, otherwise send to verify
            {
                return redirect()->route('verify.index');
            }
        }
       

        return $next($request);
    }
}