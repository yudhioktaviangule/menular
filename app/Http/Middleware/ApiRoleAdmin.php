<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class ApiRoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $head = $request->header('Authorization');
        $head = explode(' ',$head);
        if($head[0]=='Bearer'):
            $data = User::where('remember_token',$head[1])->first();
            if($data==NULL):
                return response()->json(['msg'=>'error, Invalid Authorization','error'=>403],403);    
            endif;
            
            return $next($request);
        else:
            return response()->json(['msg'=>'error, Invalid Authorization','error'=>403],403);
        endif;
    }
}
