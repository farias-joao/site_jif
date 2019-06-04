
<!-- Modal -->
<div class="modal fade" id="modalResult" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form method="post" action="{{  url('admin\results')}}">
                    {{csrf_field()}}
                    <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group ">
                            <label class="control-label">Jogo</label>
                            <select class="form-control col-sm-10" id="selectGame" name="selectGame">
                                @foreach($gamesTeam as $game)
                                    <option value="{{$game->id}}">
                                        {{$game->game->id}} ------- {{$game->game->local->alias}} ------
                                        {{$game->team->team_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-xs-3 ">
                            <label class="control-label">Status</label>
                            <select class="form-control col-xs-3" id="selectStatus" name="selectStatus">
                                <option value=0>Derrota</option>
                                <option value=1>Vitoria</option>
                                <option value=2>Empate</option>
                                <option value=3>W.O.</option>
                            </select>
                        </div>
                    </div>
            </div>
                </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
