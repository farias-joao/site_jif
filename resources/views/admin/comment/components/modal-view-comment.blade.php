<!-- Modal -->
<div class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes Comentário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ url('admin/comments')}}">
                {{csrf_field()}}
                {{method_field('patch')}}

                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="author">Nome Autor</label>
                            <input id="author" class="form-control" name="author" type="text" value="" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="radio-inline">
                            <label disabled="true">
                                <input name="optionsRadios" id="optNotice" type="radio" checked=""
                                       value="option1" disabled="true">
                                Noticia
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label disabled="true">
                                <input name="optionsRadios" id="optGame" type="radio" value="option2" disabled="true">
                                Jogo
                            </label>
                        </div>
                    </div>
                    <div class="form-group " id="game" style="display: none;">
                        <input class="form-control col-sm-10" id="selectGame" name="selectGame">

                        </input>
                    </div>

                    <div class="form-group" id="notice">
                        <input class="form-control" id="selectNotice" name="selectNotice" disabled="true"></input>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="content">Conteudo</label>
                            <textarea id="content" class="form-control" name="content"
                                      value=" " disabled="true"></textarea>
                        </div>
                    </div>

                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-danger">Remover</button>
            </div>
        </div>
    </div>
</div>
