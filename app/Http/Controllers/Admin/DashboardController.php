<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        // $user = $request->session()->get('user');
        // echo $user->role;
        // Cookie::queue("testing","okeoke");
        // var_dump(Cookie::get("user"));
        $title = "DASHBOARD";
        return view("pages.admin.index", compact("title"));
    }
}
