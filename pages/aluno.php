<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- imports -->
    <script src="../src/bootstrap/js/jquery-3.2.1.min.js" ></script>
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="../src/bootstrap/js/bootstrap.js" ></script>

    <link rel="stylesheet" href="../src/style.css">
    <script src="../js/alunoServices.js" defer="defer" ></script>
    <script src="../js/appAluno.js" defer="defer" ></script>
</head>
<body class="alunoBody">

<!--Header  -->
<?php include "header.php"; ?>


<!--Button trigger modal -->
<button type="button" class="btn btn-primary newAluno" data-toggle="modal" data-target="#cadastroModal">
    +Aluno
</button>



<div class="mainContainer" id="alunos">
    
</div>


<!-- Modal Cadastro-->
<div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="" id="newAluno" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="nome" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">CPF</label>
                        <input type="text" class="form-control" name="cpf" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dataNasc" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Endereco</label>
                        <input type="text" class="form-control" name="enderec" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" class="form-control" name="tel" >
                    </div>
                    
                    <div class="form-group">
                    <label for="">escola</label>
                    <!-- <input type="text" class="form-control" name="cdSala" > -->
                    <select name="cdSala" class="dropEscola">
                    
                    </select>
                </div>
                    
                    <div class="form-group">
                        <label for="">Codigo da turma</label>
                        <input type="text" class="form-control" name="cdTurma" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" class="form-control" name="pass" >
                    </div>
                        
                    <input type="hidden" name="newAluno" value="newAluno">

                
                    <div class="form-group">
                        <label for="exampleInputFile">Imagem de Perfil</label>
                        <input type="file" class="form-control-file" id="imgPerfil" name="arquivo" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Selecione apenas uma foto para o perfil do aluno.</small>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit"  class="btn btn-primary" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edição de Cadastro-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Edição Aluno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="" id="editaAluno" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="nome" >
                    </div>
                    
                    <!-- <div class="form-group">
                        <label for="">CPF</label>
                        <input type="text" class="form-control" name="cpf" >
                    </div> -->
                    
                    <div class="form-group">
                        <label for="">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dataNasc" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Endereco</label>
                        <input type="text" class="form-control" name="enderec" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" class="form-control" name="tel" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">escola</label>
                        <!-- <input type="text" class="form-control" name="cdSala" > -->
                        <select name="cdSala" class="dropEscola">
                        
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Codigo da turma</label>
                        <input type="text" class="form-control" name="cdTurma" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="password" class="form-control" name="pass" >
                    </div>
                        
                    <input type="hidden" class="editAluno" name="editAluno" value="">

                
                    <div class="form-group">
                        <label for="exampleInputFile">Imagem de Perfil</label>
                        <input type="file" class="form-control-file"  name="arquivo" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Selecione apenas uma foto para o perfil do aluno.</small>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit"  class="btn btn-primary" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- footer -->
<?php include "footer.php" ?> 
</body>
</html>
