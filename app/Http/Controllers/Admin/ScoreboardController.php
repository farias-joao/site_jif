<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameTeam;
use App\Models\Result;
use App\Models\ResultScoreboard;
use App\Models\Round;
use App\Models\Scoreboard;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scoreboards = Scoreboard::orderBy('created_at', 'desc')->get();
        return view('admin/scoreboard.index', compact('scoreboards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $game_teams = GameTeam::all();
        $teams = Team::all();
        return view('admin/scoreboard.create', compact('game_teams', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $result = Result::where('game_team_id', $request->get('selectGame'))->first();


        if (!$result) {
            $result = new Result;
            $result->status_result = $request->get('selectStatus');
            $result->game_team_id = $request->get('selectGame');

            $result->save();

            $scoreboard = new Scoreboard;

            $scoreboard->points = $request->points;
            $round = new Round;
            $round->round_number = $request->round;
            $scoreboard->status = $request->get('selectStatus');
            $result->scoreboards()->save($scoreboard);
            $scoreboard->round()->save($round);

            DB::commit();
        }elseif($result){
            $scoreboard = new Scoreboard;

            $scoreboard->points = $request->points;
            $scoreboard->round = $request->round;
            $scoreboard->status = $request->get('selectStatus');
            $result->scoreboards()->save($scoreboard);

            DB::commit();
        }else{
            DB::rollBack();
        }


        $request->session()->flash('alert-success', 'Placar criado com sucesso!');
        return redirect()->route('admin.scoreboards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Scoreboard $scoreboard
     * @return \Illuminate\Http\Response
     */
    public function show(Scoreboard $scoreboard)
    {

        return view('admin/scoreboard.show', compact('scoreboard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Scoreboard $scoreboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Scoreboard $scoreboard)
    {
        $action = action('Admin\ScoreboardController@update', $scoreboard->id);
        $game_teams = GameTeam::all();
        $teams = Team::all();

        return view('admin/scoreboard.edit', compact('scoreboard', "action",'game_teams','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Scoreboard $scoreboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scoreboard $scoreboard)
    {
        $scoreboard->points = $request->points;

        $scoreboard->save();
        $request->session()->flash('alert-success', 'Placar alterado com sucesso!');

/*        $game = Game::with('teams')->where('id','=',$request->get('selectGame'))->get();

        broadcast(new \App\Events\GameEvent($game));*/

        broadcast(new \App\Events\ScoreboardEvent($scoreboard));

        return redirect("admin\scoreboards");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Scoreboard $scoreboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Scoreboard $scoreboard)
    {
        $scoreboard->delete();
        $request->session()->flash('alert-success', 'Placar apagado com sucesso!');
        return redirect()->back();
    }
}
