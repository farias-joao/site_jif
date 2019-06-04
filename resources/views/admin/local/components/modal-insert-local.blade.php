
<!-- Modal -->
<div class="modal fade" id="modalLocal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Local</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post"
                  action="{{  url('admin\locals')}}">
                {{csrf_field()}}

                <div class="modal-body">

                    <div class="box-body">
                        <input name="local_id" type="hidden" value="@isset($local) {{encrypt($local->id)}} @endisset">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="alias">Nome</label>
                                <input id="alias" class="form-control" name="alias" type="text"
                                       value=" @if(!isset($local->alias)){{ ''}}@else {{$local->alias}}@endif">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10">
                                <label for="street">Rua</label>
                                <input id="street" class="form-control" name="street" type="text"
                                       value=" @if(!isset($local->address->street)){{ ''}}@else {{$local->address->street}}@endif">
                            </div>

                            <div class="col-md-2">
                                <label for="number">Numero</label>
                                <input id="number" class="form-control" name="number"
                                       value="@if(!isset($local->address->number)){{ ''}}@else {{$local->address->number}}@endif"></input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="neighborhood">Bairro</label>
                                <input id="neighborhood" class="form-control" name="neighborhood"
                                       value="@if(!isset($local->address->neighborhood)){{ ''}}@else {{$local->address->neighborhood}}@endif"></input>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">

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


