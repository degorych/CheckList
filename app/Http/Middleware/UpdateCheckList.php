<?php

namespace App\Http\Middleware;

use Closure;
use App\CheckList;

class UpdateCheckList
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
        $checkList = CheckList::where('name', $request->name)->first();
        if ($checkList->user_id === null) {
            return redirect()->back()->with(['error' => 'Can not update check list']);
        }
        return $next($request);
    }
}
