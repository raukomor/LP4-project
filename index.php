<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Aluno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="src/cesese.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/services.js" defer="defer"></script>
</head>

<body>
    <?php
        require_once("config.php");
        
        //session_regenerate_id();
        //echo session_id();
        // var_dump(session_status());
        // echo "<br>";
        // var_dump($_SESSION);
        // $_SESSION["nome"] = "batata";
        // echo session_save_path();
        
        // $sql = new Sql();
        // $usuarios = $sql->select("SELECT * FROM aluno");
        // echo json_encode($usuarios);
        
        //carrega só um usuário
        // $rodrigo = new Aluno("");
        // $rodrigo->loadById(4);
        // echo $rodrigo;

        //carregando todos os alunos
        // $lista = Aluno::getList();
        // echo json_encode($lista);

        //procurando lista de alunos pelo nome login
        // $search = Aluno::search("ro");
        // echo json_encode($search);

        //carregar um aluno usando login e senha
        // $escola = new Escola();
        // $escola->loadById(3);
        // $escola->delete();
        //$tt = json_decode($batata);
        //echo $batata->;
        //$escola = new Escola("FATEC","praca 19 de janeiro",34343434);
        //$escola->insert();
        //echo $escola;
        //var_dump($aluno->getNome());
        //echo $escola;
        //Inserir novo aluno
        // $aluno = new Aluno("Ronaldo",123123);
        // $aluno->insert();
        // echo $aluno;

        //Atualizando um cadastro
        // $aluno = new ALuno();
        // $aluno->loadById(5);
        // $aluno->update("BATATA",123123);
        // echo $aluno;

        //Deletando um aluno
        // $aluno = new Aluno("Ronaldo",26);
        // $aluno->loadById(26);
        // $aluno->delete();
        // echo $aluno;
        
        // $dt = new DateTime();
        // echo $dt->format("d/m/Y H:i:s");
        // $peiodo = new DateInterval("P15D");
        // $dt->add($peiodo);
        // echo "<br>";
        // echo $dt->format("d/m/Y H:i:s");
        // setlocale(LC_ALL, "pt_BR","pt_BR.utf-8","portuguese");
        
        // echo ucwords(strftime("%A %B"));

    ?>
    
    <nav class="navbar-dark container-fluid" style="content: '';clear: both; display:table;" id="head" >
        <div style="float:left;
                    color: white;
                    font-family: Courier;
                    display:inline;" >
                    <h1>CAD_UNO</h1>
                    <h6>cadastro de alunos</h6>
        </div>
        <div style="margin-top:2px;
                    float:right;
                    color:white;">
            <a href="#"  class="btn btn-group-lg btn-dark">Ínicio</a>
            <a href="#"  class="btn btn-group-lg btn-dark">Sobre a Empresa</a>
            <a href="#"  class="btn btn-group-lg btn-dark">Fale Conosco</a>
        </div>
    </nav>

    <div class="container " >
        <div>
            <blockquote class="blockquote text-center">
                <p class="mb-0">
                    I met a traveller from an antique land <br>
                    Who said:—Two vast and trunkless legs of stone <br>
                    Stand in the desert. Near them on the sand, <br>
                    Half sunk, a shatter'd visage lies, whose frown <br>
                    And wrinkled lip and sneer of cold command <br>
                    Tell that its sculptor well those passions read <br>
                    Which yet survive, stamp'd on these lifeless things, <br>
                    The hand that mock'd them and the heart that fed. <br>
                    And on the pedestal these words appear: <br>
                    "My name is Ozymandias, king of kings: <br>
                    Look on my works, ye mighty, and despair!" <br>
                    Nothing beside remains: round the decay <br>
                    Of that colossal wreck, boundless and bare, <br>
                    The lone and level sands stretch far away. 
                </p>
                <footer class="blockquote-footer">
                    Ozymandias - soneto de Shelley(Original)
                </footer>
            </blockquote>    
        </div>
    </div>

    <footer id="footer">
        <div class="" style="color: #57A8FF;" > 
            <div style="text-align: center;">
                CADASTRO DE ALUNOS © Copyright 2017 - 2018
                <br>
            <table style="float: right;">
                <tr>
                    <td>Fabio da Silva Araujo</td>
                    <td><a href="http://facebook.com/astrofabin">
                        <img src="https://image.flaticon.com/icons/png/128/25/25305.png" id="icon">
                        </a>
                    </td>
                    <td><a href="https://www.linkedin.com/in/fabio-a-b44393b9/">
                        <img src="https://image.freepik.com/icones-gratis/logotipo-linkedin_318-76861.jpg" id="icon">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Jefferson Costa Gomes</td>
                    <td><a href="http://facebook.com/astrofabin">
                    <img src="https://image.flaticon.com/icons/png/128/25/25305.png" id="icon">
                    </a>
                </td>
                <td><a href="https://www.linkedin.com/in/fabio-a-b44393b9/">
                    <img src="https://image.freepik.com/icones-gratis/logotipo-linkedin_318-76861.jpg" id="icon">
                    </a>
                </td>
                </tr>
                <tr>
                    <td>Rodrigo Corneta</td>
                    <td><a href="http://facebook.com/astrofabin">
                    <img src="https://image.flaticon.com/icons/png/128/25/25305.png" id="icon">
                    </a>
                </td>
                <td><a href="https://www.linkedin.com/in/fabio-a-b44393b9/">
                    <img src="https://image.freepik.com/icones-gratis/logotipo-linkedin_318-76861.jpg" id="icon">
                    </a>
                </td>
                </tr>
                <tr>
                    <td>Vitor Jesus</td>
                    <td><a href="http://facebook.com/astrofabin">
                    <img src="https://image.flaticon.com/icons/png/128/25/25305.png" id="icon">
                    </a>
                </td>
                <td><a href="https://www.linkedin.com/in/fabio-a-b44393b9/">
                    <img src="https://image.freepik.com/icones-gratis/logotipo-linkedin_318-76861.jpg" id="icon">
                    </a>
                </td>
                </tr>
            </table></div>
        </div>
    </footer>

</body>
</html>



