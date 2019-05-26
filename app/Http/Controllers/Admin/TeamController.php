<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modality;
use App\Models\Punctuation;
use App\Models\Team;
use App\Models\TypeUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('created_at', 'desc')->get();
        return view('admin\team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalities = Modality::all();
        $users = User::all();
        $teams = Team::all();

        return view('admin\team.create',compact('modalities', 'users','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new Team;

        $team->team_name = $request->team_name;
        $team->user_id = $request->get('user_id');
        $team->modality_id = $request->get('modality_id');

        $team->save();

        $punctuation = new Punctuation;

        $punctuation->total_points = 0;
        $punctuation->team_id = $team->id;
        $punctuation->total_wins = 0;
        $punctuation->total_loses = 0;
        $punctuation->total_draw = 0;

        $team->punctuation()->save($punctuation);


        $request->session()->flash('alert-success', 'Time criado com sucesso!');
        return redirect()->route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('admin\team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $action = action('Admin\TeamController@update', $team->id);

        return view('admin\team.edit', compact('team', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Team $team)
    {
        $team->team_name = $request->team_name;
        $team->user_id = $request->user_id;
        $team->modality_id = $request->modality_id;

        $team->save();
        $request->session()->flash('alert-success', 'Time alterado com sucesso!');
        return redirect("admin/teams");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Team $team)
    {
        $team->delete();
        $request->session()->flash('alert-success', 'Time apagado com sucesso!');
        return redirect()->back();
    }
}
