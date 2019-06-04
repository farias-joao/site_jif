<?php

namespace App\Http\Controllers\Site;

use App\Models\Gallery;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        $notices = Notice::paginate(3);
        return view('site.home.index', compact('notices', 'galleries'));
    }

    public function headquarter()
    {
        return view('site/home.headquarter');
    }

}
