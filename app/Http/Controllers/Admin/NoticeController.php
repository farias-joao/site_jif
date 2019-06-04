<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notice;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('created_at', 'desc')->get();
        return view('admin/notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin/notice.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notice = new Notice;

        $notice->user_id = $request->get('selectUser');
        $notice->title = $request->title;
        $notice->content = $request->content;

        if ($request->hasFile('imgUp')) {
            if ($notice->image) {
                $name = $notice->image;
            } else {
                $name = $notice->id . kebab_case($notice->title);

                $extension = $request->imgUp->extension();
                $nameFile = "{$name}.{$extension}";
                $notice->image = $nameFile;

                $request->imgUp->storeAs('images/notice', $nameFile);
            }
        }


        $notice->save();
        $request->session()->flash('alert-success', 'Noticia criada com sucesso!');
        return redirect()->route('admin.notices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view('admin/notice.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {

        $this->authorize('update-notice',$notice);

        $action = action('Admin\NoticeController@update', $notice->id);

        return view('admin/notice.edit', compact('notice', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $notice->user_id = $request->user_id;
        $notice->title = $request->title;
        $notice->content = $request->content;

        $notice->save();
        $request->session()->flash('alert-success', 'Noticia alterada com sucesso!');
        return redirect("admin/notices");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Notice $notice)
    {
        $notice->delete();
        $request->session()->flash('alert-success', 'Noticia apagada com sucesso!');
        return redirect()->back();
    }
}
