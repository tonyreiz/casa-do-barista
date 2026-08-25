<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller{

    public function index(){
    $listaBanner = Banner::orderByDesc('id_banner')
    ->get();

    return view('admin.banner.index', compact('listaBanner'));
    }

}