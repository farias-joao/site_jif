<?php

namespace App\Http\Controllers\Site;

use App\Models\Comment;
use App\Models\Game;
use App\Models\GameTeam;
use App\Models\Modality;
use App\Models\Punctuation;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Solicitation;

class GameController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalities = Modality::all();
        $count = Game::all()->where('status', '=', '1')->count();
        $games = Game::all();
        //dd($games);

        return view('site/game/live', compact('games', 'modalities', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function punctuation()
    {
        $punctuations = Punctuation::all();
        $modalities = Modality::all();
        return view('site.game.punctuation', compact('punctuations', 'modalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $comment = new Comment;

        $comment->author_comment_name = $request->name;
        $comment->content = $request->message;

        $comment->game_id = $request->game_id;

        $solicitation = new Solicitation;
        $solicitation->status = 0;
        $solicitation->save();

        $solicitation->comment()->save($comment);

        $request->session()->flash('alert-success', 'Comentario criado com sucesso!');


        return redirect()->route('games.show', [$comment->game_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('site.game.show', compact('game'));
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
