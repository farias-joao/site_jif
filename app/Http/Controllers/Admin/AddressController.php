<?php

namespace App\Http\Controllers\Admin;

use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::orderBy('created_at', 'desc')->get();
        return view('admin/address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address;

        $address->street = $request->street;
        $address->number = $request->number;
        $address->neighborhood = $request->neighborhood;
        $address->local_id = $request->local_id;

        $address->save();
        $request->session()->flash('alert-success', 'Endereco criado com sucesso!');
        return redirect()->route('address.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return view('admin/address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $action = action('Admin\AddressController@update', $address->id);

        return view('admin/address.edit', compact('address', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Address $address)
    {$address->street = $request->street;
        $address->number = $request->number;
        $address->neighborhood = $request->neighborhood;
        $address->local_id = $request->local_id;

        $address->save();
        $request->session()->flash('alert-success', 'Endereco alterado com sucesso!');
        return redirect("admin.address");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Address $address)
    {
        $address->delete();
        $request->session()->flash('alert-success', 'Endereco apagado com sucesso!');
        return redirect()->back();
    }
}
