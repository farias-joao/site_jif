<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\GameTeam;
use App\Models\Notice;
use App\Models\Solicitation;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('game','notice')->get();
        return view('admin/comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $game_teams = GameTeam::all();
        $notices = Notice::all();
        return view('admin/comment.create', compact('game_teams', 'notices'));
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

        $comment->author_comment_name = $request->author;
        $comment->content = $request->content;

        if ($request->get('selectNotice') != 0) {
            $comment->notice_id = $request->get('selectNotice');
        } else {
            $comment->game_id = $request->get('selectGame');
        }

        $solicitation = new Solicitation;
        $solicitation->status = 0;
        $solicitation->save();

        $solicitation->comment()->save($comment);


        $request->session()->flash('alert-success', 'Comentario criado com sucesso!');
        return redirect()->route('admin.comments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('admin/comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $action = action('Admin\CommentController@update', $comment->id);

        return view('admin\comment.edit', compact('comment', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->author_comment_name = $request->author;
        $comment->content = $request->content;

        if ($request->get('selectNotice') != 0) {
            $comment->notice_id = $request->get('selectNotice');
        } else {
            $comment->game_id = $request->get('selectGame');
        }

        $comment->save();
        $request->session()->flash('alert-success', 'Comentario alterado com sucesso!');
        return redirect("admin\comments");
    }

    public function aprove(Request $request, Comment $comment)
    {
        $comment->solicitation->status = 1;

        $comment->save();
        $request->session()->flash('alert-success', 'Comentario aprovado!');
        return redirect("admin\comments");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();
        $request->session()->flash('alert-success', 'Comentario apagado com sucesso!');
        return redirect()->back();
    }
}
