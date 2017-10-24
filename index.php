<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro Simples</title>
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="esimakin-twbs-pagination/jquery.twbsPagination.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

        <script type="text/javascript">
            var url = "";
        </script>
        <style type="text/css">
            .modal-dialog, .modal-content{
                z-index:1051;
            }
            .panel-primary{
                margin-top:40px;
            }
        </style>
        <script src="js/item-ajax.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">					
                    <div class="pull-left">
                        <h2>Cadastro Simples </h2>
                        <a title="Repositório PRIVADO." href=""><i class="fa fa-github" style="font-size:36px"></i></a>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                            Inserir Cadastro
                </button>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Gerenciamento de pessoas</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Endereço</th>
                                    <th width="200px">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                    </table>
                    <ul id="pagination" class="pagination-sm"></ul>
                </div>
            </div>

            <!-- Inserir Pessoa Modal -->
            <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Inserir Cadastro</h4>
                        </div>
                        <div class="modal-body">
                            <form data-toggle="validator" action="api/create.php" method="POST">
                                <div class="form-group">
                                    <label class="control-label" for="title">Nome</label>
                                    <input type="text" name="nome" class="form-control" data-error="Insira um nome" required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">Sobrenome</label>
                                    <input name="sobrenome" class="form-control" data-error="Insira um sobrenome" required></input>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">Endereço</label>
                                    <textarea name="endereco" class="form-control" data-error="Digite o Endereço" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn crud-submit btn-success">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Edit Item Modal -->
            <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
                        </div>
                        <div class="modal-body">
                            <form data-toggle="validator" action="api/update.php" method="put">
                                <input type="hidden" name="id" class="edit-id" />
                                <div class="form-group">
                                    <label class="control-label" for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" data-error="Preencha o nome" required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="sobrenome">Sobrenome</label>
                                    <input type="text" name="sobrenome" class="form-control" data-error="Preencha o sobrenome." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="endereco">Endereço</label>
                                    <textarea name="endereco" class="form-control" data-error="Preencha o Endereço." required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success crud-submit-edit">Enviar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
