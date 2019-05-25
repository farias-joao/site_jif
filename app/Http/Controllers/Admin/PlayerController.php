<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modality;
use App\Models\Player;
use App\Models\PlayerTeam;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player_teams= PlayerTeam::orderBy('created_at', 'desc')->get();
        return view('admin/player.index', compact('player_teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('admin/player.create',compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qtPlayer = Team::find($request->get('selectTeam'));

        if (PlayerTeam::where('team_id','=',$request->get('selectTeam'))->count() <= $qtPlayer->modality->total_players){
            DB::beginTransaction();
            $player = new Player;

            $player->name_player = $request->name_player;
            $player->ra_player = $request->ra_player;

            $player->save();

            $playerTeam = new PlayerTeam;

            $playerTeam->player_id = $player->id;
            $playerTeam->team_id = $request->get('selectTeam');

            $playerTeam->save();

            DB::commit();
        }else{
            DB::rollBack();
        }

        $request->session()->flash('alert-success', 'Jogador criado com sucesso!');
        return redirect()->route('admin.players.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Player $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('admin/player.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Player $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $action = action('Admin\PlayerController@update', $player->id);

        return view('admin/player.edit', compact('player', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Player $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Player $player)
    {
        $player->name_player = $request->name_player;
        $player->ra_player = $request->ra_player;

        $player->save();
        $request->session()->flash('alert-success', 'Jogador alterado com sucesso!');
        return redirect("admin\players");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Player $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Player $player)
    {
        $player->delete();
        $request->session()->flash('alert-success', 'Jogador apagado com sucesso!');
        return redirect()->back();
    }
}
