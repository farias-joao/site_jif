
<!-- Modal -->
<div class="modal fade" id="modalTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Times</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('admin\teams')}}">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="team_name">Nome Time</label>
                            <input type="text" class="form-control" id="team_name" name="team_name"
                                   placeholder="Nome Time"
                                   value=" ">
                        </div>
                        <div class="form-group ">
                            <label for="user_id">Técnico</label>
                            @can('adm')
                                <select id="user_id" class="form-control" name="user_id">
                                    @if(isset($users))
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                </select>
                            @endif
                            @elsecan('técnico')
                                <input type="text" class="form-control" id="user_id" name="user_id"
                                       value="{{$user->id}}">{{$user->name}}</input>
                                <option value=""></option>
                            @endcan
                        </div>

                        <div class="form-group ">
                            <label for="modality_id">Tipo Modalidade</label>
                            <select id="modality_id" class="form-control" name="modality_id">
                                @foreach($modalities as $modality)
                                    <option value="{{$modality->id}}">{{$modality->name_modality}}</option>
                                @endforeach
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
