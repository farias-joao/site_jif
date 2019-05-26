<?php

namespace App\Http\Controllers\Admin;

use App\Models\Punctuation;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class PunctuationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $punctuations = Punctuation::orderBy('created_at', 'desc')->get();
        return view('admin/punctuation.index', compact('punctuations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('admin/punctuation.create',compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $punctuation = new Punctuation;

        $punctuation->total_points = $request->total_points;
        $punctuation->team_id = $request->get('selectTeam');
        $punctuation->total_wins = $request->total_wins;
        $punctuation->total_loses = $request->total_loses;
        $punctuation->total_draw = $request->total_draw;

        $punctuation->save();
        $request->session()->flash('alert-success', 'Pontuação criada com sucesso!');
        return redirect()->route('admin.punctuations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Punctuation $punctuation
     * @return \Illuminate\Http\Response
     */
    public function show(Punctuation $punctuation)
    {
        return view('admin/punctuation.show', compact('punctuation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Punctuation $punctuation
     * @return \Illuminate\Http\Response
     */
    public function edit(Punctuation $punctuation)
    {
        $action = action('Admin\PunctuationController@update', $punctuation->id);

        return view('admin/punctuation.edit', compact('punctuation', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Punctuation $punctuation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Punctuation $punctuation)
    {
        $punctuation->total_points = $request->total_points;
        $punctuation->team_id = $request->team_id;
        $punctuation->total_wins = $request->total_wins;
        $punctuation->total_loses = $request->total_loses;
        $punctuation->total_draw = $request->total_draw;

        $punctuation->save();
        $request->session()->flash('alert-success', 'Pontuação alterada com sucesso!');
        return redirect("admin\punctuations");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Punctuation $punctuation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Punctuation $punctuation)
    {
        $punctuation->delete();
        $request->session()->flash('alert-success', 'Pontuação apagada com sucesso!');
        return redirect()->back();
    }
}
