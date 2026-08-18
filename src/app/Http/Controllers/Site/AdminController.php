<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class AdminController extends Controller{
    public function dash(){
        

        return view('dash.dashboard.dashboard');
    }

}