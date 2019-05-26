<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalities = Modality::orderBy('created_at', 'desc')->get();
        return view('admin/modality.index', compact('modalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/modality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modality = new Modality;

        $modality->name_modality = $request->name_modality;
        $modality->total_players = $request->total_players;

        $modality->save();
        $request->session()->flash('alert-success', 'Modalidade criada com sucesso!');
        return redirect()->route('admin.modalities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Modality $modality
     * @return \Illuminate\Http\Response
     */
    public function show(Modality $modality)
    {
        return view('admin/modality.show', compact('modality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Modality $modality
     * @return \Illuminate\Http\Response
     */
    public function edit(Modality $modality)
    {
        $action = action('Admin\ModalityController@update', $modality->id);

        return view('admin/modality.edit', compact('modality', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Modality $modality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Modality $modality)
    {
        $modality->name_modality = $request->name_modality;
        $modality->total_players = $request->total_players;

        $modality->save();
        $request->session()->flash('alert-success', 'Modalidade alterada com sucesso!');
        return redirect("admin\modalities");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Modality $modality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Modality $modality)
    {
        $modality->delete();
        $request->session()->flash('alert-success', 'Modalidade apagada com sucesso!');
        return redirect()->back();
    }
}
