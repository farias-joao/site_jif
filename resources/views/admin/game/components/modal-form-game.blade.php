<div class="modal fade" id="teste" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro Jogo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST"
                  action="{{ url('admin\games')}}">
                {{csrf_field()}}

                <div class="modal-body">
                    <div class="form-group ">
                        <label>Local</label>
                        <select class="form-control" id="local_id" name="local_id">
                            @foreach($locals as $local)
                                <option value="{{$local->id}}">
                                    {{$local->alias}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label>Modalidade</label>
                        <select class="form-control" id="modality_id" name="modality_id">
                            <option value="0">
                                Selecione Modalidade
                            </option>
                            @foreach($modalities as $modality)
                                <option value="{{$modality->id}}">
                                    {{$modality->name_modality}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="selectTeams">Times</label>
                        <select class="form-control  js-example-basic-multiple" multiple="multiple"
                                id="selectTeams" name="selectTeams[]">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="data">Data</label>
                        <input id="data" class="form-control" name="data"
                               value=" "
                               placeholder="dd/mm/aaaa"></input>
                    </div>

                    <div class="form-group">
                        <label for="schedule">Horario</label>
                        <input id="schedule" class="form-control" name="schedule"
                               value=" "
                               placeholder="HH:mm"></input>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="status_game" name="status_game">
                            <option value=0>Aberto</option>
                            <option value=1>Ocorrendo</option>
                            <option value=2>Encerrado</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </form>
        </div>
    </div>
</div>
