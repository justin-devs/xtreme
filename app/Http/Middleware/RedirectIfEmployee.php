<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Job;
use App\Vehicle;
use App\Employee;


class RedirectIfEmployee
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'employee')
	{
	    if (Auth::guard($guard)->check()) {
	    	$employees = Employee::all();
        $jobs = Job::all();
        return view('employee.home', ['jobs' => $jobs, 'employees' => $employees]);

	    }

	    return $next($request);
	}
}