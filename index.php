<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        // session_id("sivkqlhd372lsosfmogptbmok7");
        // var_dump(session_save_path());
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
        $aluno = new Aluno("",0);
        $aluno->login("rodrigo",123);
        var_dump($aluno->getNome());
        echo $aluno;
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
</body>
</html>



