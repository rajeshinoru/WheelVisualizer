<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'admin')
	{
		
	    if (!Auth::guard($guard)->check()) {
	        return redirect('admin/login');
	    }

	    $admin = Auth::guard('admin')->user();  
	    if($admin->is_super == 0){

	    $paths = explode('/', Route::getCurrentRoute()->uri);
	    $routename = $paths[1]; 

	    	if(in_array($routename, json_decode($admin->Roles->read??[]))|| in_array($routename, json_decode($admin->Roles->write??[])) || !getAdminModules($routename,'check'))
	    	{
	    		return $next($request);
	    	}
	    	else{
	    		return redirect('/404');
	    	}
	    }

	    // dd(Auth::guard('admin')->user()->Roles());

	    return $next($request);
	}
}