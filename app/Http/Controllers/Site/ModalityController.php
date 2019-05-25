<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModalityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.modalities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $$nomeModalidade
     * @return \Illuminate\Http\Response
     */
    public function show($nomeModalidade)
    {
        if ($nomeModalidade === 'volley') {
            return view('site.modalities.volley');
        } elseif ($nomeModalidade === 'handball') {
            return view('site.modalities.handball');
        } elseif ($nomeModalidade === 'futsal') {
            return view('site.modalities.futsal');
        } elseif ($nomeModalidade === 'basquete') {
            return view('site.modalities.basquete');
        } elseif ($nomeModalidade === 'xadrez') {
            return view('site.modalities.xadrez');
        } elseif ($nomeModalidade === 'tenis-de-mesa') {
            return view('site.modalities.tenis-de-mesa');
        } else {
            return view('site.modalities.futebol');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
