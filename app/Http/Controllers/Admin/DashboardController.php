<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller {

    /**
     * @name index
     * @author KPO
     */
    public function index() {
        return view("admin.dashboard.index");
    }

}
