
<?php
    require_once("../config.php");
    header('Cache-Control: no-cache, must-revalidate'); 
    header('Content-Type: application/json; charset=utf-8');
    $escola = new Escola();
    
    // retorna todas as escolas
    if(isset($_POST["relatorio"]) && $_POST["relatorio"]=="all"){
        if($escola->getList() != null){
            echo json_encode($escola->getList());
        }
        else{
            echo json_encode(array("erro"=>"Não foi possível encontrar nenhum dado"));
        }
    }
    
    // retorna a escola pelo codigo
    if(isset($_POST["relatorioCode"]) && $_POST["relatorioCode"]!=null){
        $escola->loadById($_POST["relatorioCode"]);
        if( $escola != null){
            echo $escola;
        }
        else{
            echo json_encode(array("erro"=>"Não foi possível encontrar nenhum dado"));
        }
    }

    // Procura a escola pelo nome
    if(isset($_POST["search"]) && $_POST["search"]!=null){
        
        if( $escola->search($_POST["search"]) != null){
            echo json_encode($escola->search($_POST["search"]));
        }
        else{
            echo json_encode(array("erro"=>"Não foi possível encontrar nenhum dado"));
        }
    }

    // Nova Escola
    if(isset($_POST["newEscola"]) && $_POST["newEscola"]){
        
        try{
            $escola = new Escola($_POST["name"],$_POST["end"],$_POST["tel"]);
            $escola->insert();
            echo json_encode(array("success"=>"Cadastro criado com sucesso"));
        }catch (Exception $e) {
            echo json_encode(array("erro"=>$e->getMessage()));
        }
    }

    // Editar Uma Escola
    if(isset($_POST["editEscola"]) && $_POST["editEscola"]){
        
        try{
            $escola->update($_POST["code"],$_POST["name"],$_POST["end"],$_POST["tel"]);
            echo json_encode(array("success"=>"Cadastro Editado com sucesso"));
        }catch (Exception $e) {
            echo json_encode(array("erro"=>$e->getMessage()));
        }
    }

    //deletar uma Escola
    if(isset($_POST["deleteEscola"]) && $_POST["deleteEscola"]){
        
        try{
            $escola->delete($_POST["code"]);
            echo json_encode(array("success"=>"Escola Excluida com sucesso"));
        }catch (Exception $e) {
            echo json_encode(array("erro"=>$e->getMessage()));
        }
    }
    
    $_POST = array();
?>


