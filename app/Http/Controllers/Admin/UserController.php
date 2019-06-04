<?php

namespace App\Http\Controllers\Admin;

use App\Models\TypeUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin\user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_users = TypeUser::all();

        return view('admin/user.create',compact('type_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        if($this->validate($request,$user->rules)) {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->cpf = $request->cpf;
            $user->type_user_id = $request->get('selectTypeUser');
            $user->password = bcrypt($request->password);

            $user->save();
            $request->session()->flash('alert-success', 'Usuario criado com sucesso!');
            return response()->json('alert-success', 'Usuario criado com sucesso!');
        }else{
            return response()->json(['errors'=>$this->validate($request,$user->rules)]);
        }
        /*return redirect()->route('admin.users.index');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('adm/user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $action = action('Admin\UserController@update', $user->id);
        $type_users = TypeUser::all();

        return view('admin/user.edit', compact('user', "action",'type_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->type_user_id = $request->get('selectTypeUser');
        $user->password = bcrypt($request->password);

        $user->save();
        $request->session()->flash('alert-success', 'Usuario alterado com sucesso!');
        return redirect("users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        $request->session()->flash('alert-success', 'Usuario apagado com sucesso!');
        return redirect()->back();
    }
}
