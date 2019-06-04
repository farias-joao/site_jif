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
    public function index()
    {
        $count_user = User::all()->count();
        $count_modality = Modality::all()->count();
        $count_team = Team::all()->count();

        if(auth()->user()->can('adm')){
            return view('admin\home.index', compact('count_user','count_modality', 'count_team'));
        }elseif(auth()->user()->can('técnico')){
            return view('admin\home.technician');
        }elseif (auth()->user()->can('editor')){
            return view('admin\home.publisher');
        }

    }

    public function rolesPermission()
    {
        $nameUser = auth()->user()->name;
        echo ("<h1>{$nameUser}</h1>");

        foreach (auth()->user()->roles as $role){
            echo "<b>".$role->name."</b> -> " ;
            $permissions = $role->permissions;

            foreach ($permissions as $permission){
                echo $permission->name;
                echo "<hr>";
            }
        }
    }
}
