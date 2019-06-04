
<!-- Modal -->
<div class="modal fade" id="modalPlayer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserir Jogador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{  url('admin\players')}}">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name_player">Nome</label>
                            <input id="name_player" class="form-control" name="name_player" type="text"
                                   value=" ">
                        </div>

                        <div class="form-group">
                            <label for="ra_player">Numero RA</label>
                            <input id="ra_player" class="form-control" name="ra_player"
                                   value=" "></input>
                        </div>

                        <div class="form-group ">
                            <label>Times</label>
                            <select class="form-control" id="selectTeam" name="selectTeam">
                                @if(isset($teams))
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}">
                                            {{$team->team_name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </div>
    </div>
</div>