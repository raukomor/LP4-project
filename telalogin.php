<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Entrar</title>
        <link rel="stylesheet" type="text/css" href="src/cesese.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>        
        <div class="card text-white bg-primary mb-3" style="max-width: 20rem;margin: 0 auto;margin-top: 100px;">
            <div class="card-body">
                <h1 class="display-4 text-center" style="font-family: Courier">Login_</h1>
                <form action="Login" method="post">
                  <div class="form-group">
                    <label for="loginUsuario">Usuário</label>
                    <input type="text" name="usuario" class="form-control" id="loginUsuario" placeholder="Digite seu nome de usuário">
                  </div>
                  <div class="form-group">
                    <label for="loginSenha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="loginSenha" placeholder="Digite sua senha">
                  </div>
                    <!--<button type="submit" value="login">-->
                        <a href="index.php" class="btn btn-success btn-lg btn-block">Entrar</a> 
                    <!--</button>-->
                </form>
            </div>
        </div>
    </body>
</html>