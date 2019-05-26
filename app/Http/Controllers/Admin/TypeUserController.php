<?php

namespace App\Http\Controllers\Admin;

use App\Models\TypeUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeusers = TypeUser::all();

        return view('admin\typeuser.index',compact('typeusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_users = TypeUser::all();

        return view('admin/typeuser.create',compact('type_users'));
    }

    public function store(Request $request)
    {
        $typeuser = new TypeUser;

        $typeuser->type = $request->type;
        $typeuser->permission = $request->get('selectTypePermission');

        $typeuser->save();
        $request->session()->flash('alert-success', 'Tipo Usuario criado com sucesso!');

        return redirect()->route('admin.typeusers.index');
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
    public function edit(TypeUser $typeuser)
    {
        $action = action('Admin\TypeUserController@update', $typeuser->id);
        $type_users = TypeUser::all();

        return view('admin/typeuser.edit', compact('user', "action",'type_users','typeuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $typeuser)
    {
        $typeuser->type = $request->type;
        $typeuser->permission = $request->get('selectTypePermission');

        $typeuser->save();
        $request->session()->flash('alert-success', 'Usuario alterado com sucesso!');
        return redirect("typeusers");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TypeUser $typeuser)
    {
        $typeuser->delete();
        $request->session()->flash('alert-success', 'Usuario apagado com sucesso!');
        return redirect()->back();
    }
}
