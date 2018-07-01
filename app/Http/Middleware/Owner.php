<?php

namespace App\Http\Middleware;

use App\Model\user\event;
use Closure;
use Illuminate\Support\Facades\Auth;

class Owner
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
        $event = Event::find($request->id);

        if ($event->user_id != Auth::user()->id)
        {
            return redirect("/events");
        }
        return $next($request);
    }
}
