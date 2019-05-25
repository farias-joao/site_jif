<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameTeam;
use App\Models\Notice;
use App\Models\Solicitation;
use Illuminate\Http\Request;

class SolicitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitations = Solicitation::orderBy('created_at', 'desc')->get();
        return view('admin/solicitation.index', compact('solicitations'));
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
        return view('admin/solicitation.create',compact('game_teams','notices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitation = new Solicitation;

        $solicitation->status = $request->status;

        $solicitation->save();
        $request->session()->flash('alert-success', 'Solicitacao criado com sucesso!');
        return redirect()->route('admin.solicitations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Solicitation $solicitation
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitation $solicitation)
    {
        return view('admin/solicitation.show', compact('solicitation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Solicitation $solicitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitation $solicitation)
    {
        $action = action('Admin\SolicitationController@update', $solicitation->id);

        return view('admin/solicitation.edit', compact('solicitation', "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Solicitation $solicitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitation $solicitation)
    {
        $solicitation->status = $request->status;

        $solicitation->save();
        $request->session()->flash('alert-success', 'Solicitacao alterada com sucesso!');
        return redirect("admin\solicitations");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Solicitation $solicitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Solicitation $solicitation)
    {
        $solicitation->delete();
        $request->session()->flash('alert-success', 'Solicitacao apagada com sucesso!');
        return redirect()->back();
    }
}
