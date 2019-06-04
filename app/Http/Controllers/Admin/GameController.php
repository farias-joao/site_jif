<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameTeam;
use App\Models\Local;
use App\Models\Modality;
use App\Models\Result;
use App\Models\Round;
use App\Models\Scoreboard;
use App\Models\Team;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function teamJson(Request $request)
    {
        $modality_id = $request->get('modality_id');

        $team_modality = DB::table('teams')->where('modality_id', $modality_id)->get();

        return ($team_modality);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $game_teams = GameTeam::orderBy('created_at', 'desc')->get();

        return view('admin/game.index', compact('game_teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locals = Local::all();
        $teams = Team::all();
        $modalities = Modality::all();
        return view('admin/game.create', compact('locals', 'teams', 'modalities'));
    }

    public function roundInit(Game $game)
    {
        if($game->status == 1){
            $round = new Round;
            $round->round_number = 1;
            $round->game_id = $game->id;
            $round->save();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        $game = new Game;

        $game->local_id = $request->get('local_id');
        $game->data = date('Y-m-d', strtotime(str_replace("/", "-", $request->data)));
        $game->schedule = date("H:i:s", strtotime($request->schedule));
        $game->modality_id = $request->get('modality_id');
        $game->status = $request->get('status_game');

        $game->save();

        $this->roundInit($game);

        foreach ($request->get('selectTeams') as $team) {
            $gameTeam = new GameTeam;
            $gameTeam->game_id = $game->id;
            $gameTeam->team_id = $team;

            $game->gameteams()->save($gameTeam);
        }

        $request->session()->flash('alert-success', 'Jogo criado com sucesso!');
        return redirect()->route('admin.games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Game $game
     * @return \Illuminate\Http\Response
     */
    public
    function show(Game $game)
    {
        return view('admin/game.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Game $game
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Game $game)
    {
        $action = action('Admin\GameController@update', $game->id);

        return view('admin/game.edit', compact('game', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Game $game
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Game $game)
    {
        $game->local_id = $request->local_id;
        $game->data = $request->data;
        $game->schedule = $request->schedule;

        $game->save();
        $this->roundInit($game);
        $request->session()->flash('alert-success', 'Jogo alterado com sucesso!');
        return redirect("admin/games");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Game $game
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Request $request, Game $game)
    {
        $game->delete();
        $request->session()->flash('alert-success', 'Jogo apagado com sucesso!');
        return redirect()->back();
    }
}
