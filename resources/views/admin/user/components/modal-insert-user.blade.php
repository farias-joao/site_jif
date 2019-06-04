<!-- Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="form-horizontal"
                  action="{{url('admin/users')}}">
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <img class="profile-user-img img-responsive img-circle"
                         src="{{asset('/storage/images/users/ft_usuario_padrao.jpg')}}" alt="Foto usuário">

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="col-sm-2 control-label">Campus</label>
                        <div class="col-sm-10">
                            <select class="form-control col-sm-10" id="selectLocal" name="selectLocal">
                                <option>Selecione o local</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="col-sm-2 control-label">Siape</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="siape" placeholder="Siape" name="siape" value="{{old('siape')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                   value="{{old('email')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Senha</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="Senha" name="password">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-2 control-label">Função</label>
                        <div class="col-sm-10">
                            <select class="form-control col-sm-10" id="selectRole" name="selectRole">
                                <option>Selecione Função</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="imgUp">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" id="imgUp" class="form-control" name="imgUp"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-info pull-right" id="insertSubmit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
