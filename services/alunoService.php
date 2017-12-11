
<?php
    require_once("../config.php");
    header('Cache-Control: no-cache, must-revalidate'); 
    //header('Content-Type: application/json; charset=utf-8');
    //header('Content-Type: text/html; charset=utf-8');
            // print_r($_POST);
            // print_r($_FILES);
    
            // try{
            //     $aluno = new Aluno(45690894885,"Rodrigo",26-09-1997,"batata",34343434,"",158,1,123);
                
            //     getImage($aluno);
                
                
            //     $aluno->insert();
            //     echo json_encode(array("success"=>"Cadastro criado com sucesso"));
            // }catch (Exception $e) {
            //     echo json_encode(array("erro"=>$e->getMessage()));
            // }
        

    //retorna todos os alunos
    if(isset($_POST["relatorio"]) && $_POST["relatorio"]=="all"){
        $aluno = new Aluno();
        if($aluno->getList() != null){
            echo json_encode($aluno->getList());
        }
        else{
            echo json_encode(array("erro"=>"Não foi possível encontrar nenhum dado"));
        }
    }
    
    // // retorna a escola pelo codigo
    // if(isset($_POST["relatorioCode"]) && $_POST["relatorioCode"]!=null){
    //     $escola->loadById($_POST["relatorioCode"]);
    //     if($escola->getNm_escola() != null){
    //         echo $escola;
    //     }
    //     else{
    //         echo json_encode(array("erro"=>"Não foi possível encontrar nenhum dado"));
    //     }
    // }

    // // Procura a escola pelo nome
    // if(isset($_POST["search"]) && $_POST["search"]!=null){
        
    //     if( $escola->search($_POST["search"]) != null){
    //         echo json_encode($escola->search($_POST["search"]));
    //     }
    //     else{
    //         echo json_encode(array("erro"=>"Não foi possível encontrar nenhum dado"));
    //     }
    // }

    // Novo Aluno
    if(isset($_POST["newAluno"])){
        try{
            $aluno = new Aluno($_POST["cpf"],$_POST["nome"],$_POST["dataNasc"],$_POST["enderec"],$_POST["tel"],"",$_POST["cdSala"],$_POST["cdTurma"],$_POST["pass"]);
            
            //verificando se existe o diretorio desse usuario
            if(!is_dir("../usersImg")){
                mkdir("../usersImg/");
            }
            
            if(!is_dir("../usersImg/".$aluno->getCd_cpf())){
                mkdir("../usersImg/".$aluno->getCd_cpf());
            }
            else{
                foreach(scandir("../usersImg/".$aluno->getCd_cpf()) as $item){
                    if(!in_array($item, array(".",".."))){
                        unlink("../usersImg/".$aluno->getCd_cpf(). DIRECTORY_SEPARATOR .$item);
                    }
                } 
            }
            
           //verificando a imagem 
            $file = $_FILES['arquivo'];
            
            if(isset($file)){
                $extensao = strtolower(substr($file['name'], -4));//pega extensao
                $novo_nome = $aluno->getNm_pessoa() . $extensao; //define o nome do arquivo
                $diretorio = "../usersImg/".$aluno->getCd_cpf(); //define o diretorio para onde eviaremos o arquivo
                $newPath = $diretorio. "/" .$novo_nome;
                move_uploaded_file($file['tmp_name'], $newPath); //efetuar o upload
                $aluno->setIm_perfil($newPath);
            }
            
            $aluno->insert();
            echo json_encode(array("success"=>"Cadastro criado com sucesso"));
        }catch (Exception $e) {
            echo json_encode(array("erro"=>$e->getMessage()));
        }
    }

    // if(isset($_FILES["arquivo"])){
    //     getImage($aluno);
    // }
    

    // // Editar Uma Escola
    // if(isset($_POST["editEscola"]) && $_POST["editEscola"]){
        
    //     try{
    //         $escola->update($_POST["code"],$_POST["name"],$_POST["end"],$_POST["tel"]);
    //         echo json_encode(array("success"=>"Cadastro Editado com sucesso"));
    //     }catch (Exception $e) {
    //         echo json_encode(array("erro"=>$e->getMessage()));
    //     }
    // }

    // //deletar uma Escola
    // if(isset($_POST["deleteEscola"]) && $_POST["deleteEscola"]){
        
    //     try{
    //         $escola->delete($_POST["code"]);
    //         echo json_encode(array("success"=>"Escola Excluida com sucesso"));
    //     }catch (Exception $e) {
    //         echo json_encode(array("erro"=>$e->getMessage()));
    //     }
    // }
    
    function getImage($aluno){
        
        if(!is_dir("../usersImg")){
            mkdir("../usersImg/");
        }
        
        if(!is_dir("../usersImg/".$aluno->getCd_cpf())){
            mkdir("../usersImg/".$aluno->getCd_cpf());
        }
        else{
            foreach(scandir("../usersImg/".$aluno->getCd_cpf()) as $item){
                if(!in_array($item, array(".",".."))){
                    unlink("../usersImg/".$aluno->getCd_cpf(). DIRECTORY_SEPARATOR .$item);
                }
            } 
        }
        
        
        
        
        $file = $_FILES['arquivo'];
        
        if(isset($file)){
            $extensao = strtolower(substr($file['name'], -4));//pega extensao
            $novo_nome = $aluno->getNm_pessoa() . $extensao; //define o nome do arquivo
            $diretorio = "../usersImg/".$aluno->getCd_cpf(); //define o diretorio para onde eviaremos o arquivo
            $newPath = $diretorio. DIRECTORY_SEPARATOR .$novo_nome;
            move_uploaded_file($file['tmp_name'], $newPath); //efetuar o upload
            $aluno->setIm_perfil($newPath);
            return $aluno;
            // try{
            //     $sql->query("INSERT INTO arquivo(codigo, arquivo, data) VALUES(null, :ARQUIVO, NOW())", array(
            //         ':ARQUIVO'=>$novo_nome
            //     ));
            // }catch(Exeption $e){
            //     echo 'Exceção capturada: ', $e->getMessage(), "\n";
            // }
        }
    }

    // $_POST = array();
    //unset($_POST);
?>


