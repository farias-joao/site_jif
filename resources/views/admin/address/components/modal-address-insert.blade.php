
<!-- Modal -->
<div class="modal fade" id="modalLocal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserir Local</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{  url('admin/address')}}">
                {{csrf_field()}}
                <div class="modal-body">

                    <input name="address_id" type="hidden" value=" ">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="street">Rua</label>
                            <input id="street" class="form-control" name="street" type="text"
                                   value=" ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="number">Numero</label>
                            <input id="number" class="form-control" name="number"
                                   value=" "></input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="neighborhood">Bairro</label>
                            <input id="neighborhood" class="form-control" name="neighborhood"
                                   value=" "></input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="local_id">Local</label>
                            <input id="local_id" class="form-control" name="local_id"
                                   value=" "></input>
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