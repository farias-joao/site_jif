
<!-- Modal -->
<div class="modal fade" id="modalModality" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Modalidade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{  url('admin/modalities')}}">
                {{csrf_field()}}
                <div class="modal-body">

                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name_modality">Nome Modalidade</label>
                                <input id="name_modality" class="form-control" name="name_modality" type="text"
                                       value=" ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="total_players">Numero Jogadores</label>
                                <input id="total_players" class="form-control" name="total_players"
                                       value=" "></input>
                            </div>
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