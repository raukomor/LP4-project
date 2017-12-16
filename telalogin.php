

<?php

include("session.php");

if(isset($_POST['usuario'])){

    if(!isset($_SESSION))
        session_start();

   $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['senha'] = $_POST['senha'];

    $sql_code = "SELECT nm_acc, nm_pass_acc FROM user_admin WHERE nm_acc = '$_SESSION[usuario]'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
    $dado = $sql_query->fetch_assoc();
    $total = $sql_query->num_rows;


    if($total.length == 0){
        $erro[] =  "Conta não existe";
      }else{

             if($dado['nm_pass_acc'] == $_SESSION['senha']){
              $_SESSION['admin'] = $dado['nm_acc'];
              }else{

                $erro[] = "Senha incorreta";
            }

        }

        if(count($erro) == 0 || !isset($erro)){
            echo "<script>alert('Login efetuado com sucesso'); location.href='index.php';</script>";
        } 
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Entrar</title>
        <link rel="stylesheet" type="text/css" href="src/cesese.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body> 
    <div class="card text-white bg-primary mb-3 container-fluid" style="text-align: center;
                                                                        font-family:courier;">
        <div class="card-body">
            <h1 class="display-1">CAD_UNO</h1>
            <h6>Cadastro de alunos</h6>
        </div>
    </div>

    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;margin: 0 auto;margin-top: 50px;">
        <div class="card-body">
            <h1 class="display-4 text-center" style="font-family: Courier">Login_</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="loginUsuario">Usuário</label>
                    <input type="text" name="usuario" class="form-control" id="loginUsuario" placeholder="Digite seu nome de usuário">
                </div>
                <div class="form-group">
                    <label for="loginSenha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="loginSenha" placeholder="Digite sua senha">
                </div>
                <!--<button type="submit" value="login">-->
                <input type="submit" name"logar" value="Entrar" class="btn btn-success btn-lg btn-block"> 
                <!--</button>-->
            </form>
        </div>
    </div>
    </body>
</html>

