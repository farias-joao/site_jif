<?php

namespace App\Http\Controllers\Admin;

use App\Models\Modality;
use App\Models\Team;
use App\Models\TypeUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $count_user = User::all()->count();
        $count_typeuser = TypeUser::all()->count();
        $count_modality = Modality::all()->count();
        $count_team = Team::all()->count();

        return view('admin\home.index',compact('count_user','count_typeuser','count_modality','count_team'));
    }
}
