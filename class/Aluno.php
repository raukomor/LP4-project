<?php
    require_once("class/Sql.php");
    
    class Aluno{
        private $codigo;
        private $nome;
        private $dataNascimento;
        private $endereco;

        //construtor

        // public function __construct(/*$codigo,*/ $nome, $dataNascimento, $endereco){
        //     $this->codigo = 0;
        //     $this->nome = $nome;
        //     $this->dataNascimento = $dataNascimento;
        //     $this->endereco = $endereco;
        // }
        
        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($value){
            $this->codigo = $value;
        }
        
        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getDataNascimento(){
            return $this->dataNascimento;
        }

        public function setDataNascimento($dataNascimento){
            $this->dataNascimento = $dataNascimento;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }

        // exemplo de metodo
        public function exibir(){
            return array(
                "nome"=>$this->getNome(),
                "dataNascimento"=>$this->getDataNascimento(),
                "endereco"=>$this->getEndereco()
            );
        }

        //quando der echo no objeto, vai retorna esse metodo
        public function __toString(){
            return json_encode(array(
                "cdAluno"=>$this->getCodigo(),
                "nmAluno"=>$this->getNome(),
                "nmEndereco"=>$this->getEndereco()
            ));
                
                
                //$this->nome.", ".$this->dataNascimento.", ".$this->endereco;
        }

        // retirar objeto da memoria no final da execução(exibição de uma mensagem)
        public function __destruct(){
            var_dump("DESTRUIR");
        }

        public function loadById($id){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM aluno WHERE cdAluno = :ID", array(
                ":ID"=>$id
            ));
    
            if(count($results) > 0){
                $row = $results[0];
    
                $this->setCodigo($row['cdAluno']);
                $this->setNome($row['nmAluno']);
                $this->setEndereco($row['nmEndereco']);
            }
        }
    }

    //--exemplo de herança
    //--variaveis com protect só pode ser visto por herança e pela propria classe
    // class Pessoa extends Alunos{

    // }

    
?>