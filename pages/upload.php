<?php 
    require_once("../config.php");
    $sql = new Sql();

    if(!is_dir("../usersDir")){
        mkdir("../usersDir");
    }
    
    foreach(scandir("../usersDir") as $item){
        if(!in_array($item, array(".",".."))){
            unlink("../usersDir/".$item);
        }
    }


   $file = $_FILES['arquivo'];

    if(isset($file)){
        $extensao = strtolower(substr($file['name'], -4));//pega extensao
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde eviaremos o arquivo

        if(!is_dir($diretorio)){
            mkdir($diretorio);
        }
        
        move_uploaded_file($file['tmp_name'], $diretorio.$novo_nome); //efetuar o upload
        try{
            $sql->query("INSERT INTO arquivo(codigo, arquivo, data) VALUES(null, :ARQUIVO, NOW())", array(
                ':ARQUIVO'=>$novo_nome
            ));
        }catch(Exeption $e){
            echo 'Exceção capturada: ', $e->getMessage(), "\n";
        }
    }

?>
<h1>Upload de Arquivos</h1>
<form method="post" enctype="multipart/form-data">
    Arquivo <input type="file" name="arquivo" id="" required>
    <input type="submit" value="Salvar">
</form>