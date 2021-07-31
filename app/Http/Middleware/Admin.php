<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;
use Auth;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!empty(Auth::user()->is_admin)) {
            $this->common_configuration($request);
            return $next($request);
        }
        return Redirect::to(route('admin.login'));
    }

    public function common_configuration($request) {
        $breadcrumbsTitle = $breadcrumbItem = $pageTitle = '';
        switch (getControllerOrActionName()) {
            case 'DashboardController':
                $breadcrumbsTitle = 'Ultimate Race Book';
                $breadcrumbItem = 'Dashboard';
                break;
            case 'ProfileController':
                $breadcrumbsTitle = 'Profile Management';
                $breadcrumbItem = 'Profile';
                break;
            default:
                break;
        }
        $pageTitle = $breadcrumbsTitle . ' | ' . $breadcrumbItem;
        $request->request->add(['breadcrumbItem' => $breadcrumbItem, 'breadcrumbsTitle' => $breadcrumbsTitle, 'pageTitle' => $pageTitle]);
    }

}
