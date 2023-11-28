<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class UpdateUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
// app/Http/Middleware/UpdateUserStatus.php

public function handle($request, Closure $next)
{
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->status) {
            $user->status->update(['is_online' => true]);
        } else {
            $user->status()->create(['is_online' => true]);
        }
    }

    return $next($request);
}



}
