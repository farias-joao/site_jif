<?php

namespace App\Http\Controllers\Site;

use App\Models\Gallery;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {

        $notices = Notice::all();
        $galleries = Gallery::all();
        return view('site/home.index', compact('notices', 'galleries'));
    }

    public function headquarter()
    {
        return view('site/home.headquarter');
    }
}
