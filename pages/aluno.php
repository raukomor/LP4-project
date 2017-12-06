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
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="../src/bootstrap/js/bootstrap.js" ></script>

    <script src="../js/alunoServices.js" defer="defer" ></script>
    <script src="../js/appAluno.js" defer="defer" ></script>
   
    


</head>
<body>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroModal">
Launch demo modal
</button> -->

<div class="container" id="alunos">

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

    <form action="">
        <div class="modal-body">
        
            
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="" id="">
            </div>
            
            <div class="form-group">
                <label for="">CPF</label>
                <input type="text" class="form-control" name="" id="">
            </div>
            
            <div class="form-group">
                <label for="">Data de Nascimento</label>
                <input type="date" class="form-control" name="" id="">
            </div>
            
            <div class="form-group">
                <label for="">Endereco</label>
                <input type="text" class="form-control" name="" id="">
            </div>
            
            <div class="form-group">
                <label for="">Telefone</label>
                <input type="text" class="form-control" name="" id="">
            </div>
            
            <div class="form-group">
                <label for="">Código da sala</label>
                <input type="text" class="form-control" name="" id="">
            </div>
            
            <div class="form-group">
                <label for="">Codigo da turma</label>
                <input type="text" class="form-control" name="" id="">
            </div>
            
            <div class="form-group">
                <label for="">Senha</label>
                <input type="password" class="form-control" name="" id="">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Imagem de Perfil</label>
                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">Selecione apenas uma foto para o perfil do aluno.</small>
            </div>
                
                
        
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>