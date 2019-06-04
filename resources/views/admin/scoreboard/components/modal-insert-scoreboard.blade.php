<!-- Modal -->
<div class="modal fade" id="modalScoreboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Placar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{  url('admin\scoreboards')}}">
                {{csrf_field()}}

                <div class="modal-body">
                    <div class="box-body">

                        <div class="form-group ">
                            <label class="control-label">Jogo</label>
                            <select class="form-control col-sm-10" id="selectGame" name="selectGame">
                                <option value="{{$scoreboard->result->gameteam->game->id}}">
                                    {{$scoreboard->result->gameteam->game->id}}
                                    ------- {{$scoreboard->result->gameteam->game->local->alias}} ------
                                    {{$scoreboard->result->gameteam->team->team_name}}
                                </option>
                                @else
                                    @foreach($game_teams as $game)
                                        <option value="{{$game->id}}">
                                            {{$game->id}} ------- {{$game->game->local->alias}} ------
                                            {{$game->team->team_name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group ">
                            <label class="control-label">Time</label>
                            <select class="form-control col-sm-10" id="selectTeam" name="selectTeam">
                                @foreach($teams as $team)
                                    <option value="{{$team->id}}">
                                        {{$team->team_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label for="points">Pontos</label>
                                <input id="points" name="points" type="text"
                                       value=" ">
                            </div>
                            <div class="col-xs-3">
                                <label class="control-label" for="round">Rodada</label>
                                <input id="round" name="round"
                                       value=""></input>
                            </div>
                            <div class="form-group col-xs-3 ">
                                <label class="control-label">Status</label>
                                <select class="form-control col-xs-3" id="selectStatus" name="selectStatus">
                                    <option value=1>Aberto</option>
                                    <option value=0>Encerrado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

