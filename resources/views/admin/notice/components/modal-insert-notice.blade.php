<!-- Modal -->
<div class="modal fade" id="modalNotice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Noticia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{  url('admin/notices')}}"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="box-body">

                        <div class="form-group ">
                            <label class="col-sm-2 control-label">Usuario</label>
                            <select class="form-control col-md-6" id="selectUser" name="selectUser">
                                @if(isset($users))
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">
                                            {{$user->name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="title">Titulo</label>
                                <input id="title" class="form-control" name="title"
                                       value=" "></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="content">Conteudo</label>
                                <textarea id="content" class="form-control"
                                          name="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="content">Imagem</label>
                                <input type="file" id="imgUp" class="form-control" name="imgUp"></input>
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
