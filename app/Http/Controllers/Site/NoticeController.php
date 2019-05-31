<?php

namespace App\Http\Controllers\Site;

use App\Events\CommentEvent;
use App\Models\Comment;
use App\Models\Notice;
use App\Models\Solicitation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::all();
        if(count($notices ) > 0){
            return view('site.notice.index',compact('notices'));
        }else{
            return view('site.notice.index');
        }

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

        $comment = new Comment;

        $comment->author_comment_name = $request->name;
        $comment->content = $request->message;

        if ($request->notice_id != 0) {

            $comment->notice_id = $request->notice_id;
        } else {
            $comment->game_id = $request->game_id;
        }

        $solicitation = new Solicitation;
        $solicitation->status = 0;
        $solicitation->save();

        $solicitation->comment()->save($comment);

        $request->session()->flash('alert-success', 'Comentario criado com sucesso!');

        broadcast(new \App\Events\CommentEvent($comment));

        return redirect()->route('notices.show',[$comment->notice_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view('site.notice.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
