<?php

namespace App\Http\Controllers\Admin;

use App\Models\Game;
use App\Models\GameTeam;
use App\Models\Punctuation;
use App\Models\Result;
use App\Http\Controllers\Controller;
use App\Models\ResultScoreboard;
use App\Models\Team;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gamesTeam = GameTeam::all();


        return view('admin/result.index', compact('gamesTeam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gamesTeam = GameTeam::all();

        return view('admin/result.create', compact('gamesTeam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = new Result;

        $result->status_result = $request->get('selectStatus');
        $result->game_team_id = $request->get('selectGame');

        $result->save();

        $team = GameTeam::where('id', $request->get('selectGame'))->first();
        //dd($team->team->punctuation);
        if ($result->status_result == 0) {
            $team->team->punctuation->total_loses++;

        } elseif ($result->status_result == 1) {
            $team->team->punctuation->total_wins++;
            $team->team->punctuation->total_points += 3;

        } elseif ($result->status_result == 2) {
            $team->team->punctuation->total_draw++;
            $team->team->punctuation->total_points += 1;
        } else {
            $team->team->punctuation->total_loses++;
        }

        $team->team->punctuation()->save($team->team->punctuation);

        $request->session()->flash('alert-success', 'Resultado criado com sucesso!');
        return redirect()->route('admin.results.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Result $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        return view('admin/result.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Result $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        $gamesTeam = GameTeam::all();
        $action = action('Admin\ResultController@update', $result->id);


        return view('admin/result.edit', compact('result', "action", 'gamesTeam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Result $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $result->status_result = $request->get('selectStatus');
        $result->game_team_id = $request->get('selectGame');

        $result->save();
        $request->session()->flash('alert-success', 'Resultado alterado com sucesso!');
        return redirect("admin/results");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Result $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Result $result)
    {
        $result->delete();
        $request->session()->flash('alert-success', 'Resultado apagado com sucesso!');
        return redirect()->back();
    }
}
