<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locals = Local::orderBy('created_at', 'desc')->get();
        return view('admin/local.index', compact('locals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/local.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $local = new Local;

        $local->alias = $request->alias;

        $local->save();

        $address = new Address;

        $address->street = $request->street;
        $address->number = $request->number;
        $address->neighborhood = $request->neighborhood;
        $address->local_id = $request->local_id;

        $local->address()->save($address);

        $request->session()->flash('alert-success', 'Local criado com sucesso!');
        return redirect()->route('admin.locals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Local $local
     * @return \Illuminate\Http\Response
     */
    public function show(Local $local)
    {
        return view('admin/local.show', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Local $local
     * @return \Illuminate\Http\Response
     */
    public function edit(Local $local)
    {
        $action = action('Admin\LocalController@update', $local->id);

        return view('admin/local.edit', compact('local', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Local $local
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Local $local)
    {
        $local->alias = $request->alias;

        $local->address->street = $request->street;
        $local->address->number = $request->number;
        $local->address->neighborhood = $request->neighborhood;
        $local->address->local_id = $request->local_id;

        $local->address()->save($local->address);
        $request->session()->flash('alert-success', 'Local alterado com sucesso!');
        return redirect("admin\locals");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Local $local
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Local $local)
    {
        $local->delete();
        $request->session()->flash('alert-success', 'Local apagado com sucesso!');
        return redirect()->back();
    }
}
