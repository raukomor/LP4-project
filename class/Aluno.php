<?php
    
    
    class Aluno extends Pessoa{
        private $ra;
        //private $nome;
        //private $dataNascimento;
        //private $endereco;
        private $senha;

        //construtor
        public function __construct($login, $password){
        $this->setNome($login);
        $this->setSenha($password);
        }
        
        public function getRA(){
            return $this->ra;
        }

        public function setRA($value){
            $this->ra = $value;
        }
        
        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($senha){
            $this->senha = $senha;
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
                "cdAluno"=>$this->getRA(),
                "nmAluno"=>$this->getNome(),
                "nmEndereco"=>$this->getEndereco(),
                "cdSenha"=>$this->getSenha(),
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
                $this->setData($results[0]);
            }
        }

        public static function getList(){
            $sql = new Sql();

            return $sql->select("SELECT * FROM aluno ORDER BY nmAluno;");
        }

        public static function search($nome){
            $sql = new Sql();

            return $sql->select("SELECT * FROM aluno WHERE nmAluno Like :SEARCH ORDER BY nmAluno",array(
                ":SEARCH"=>"%".$nome."%"
            ));
        }

        public function login($login,$password){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM aluno WHERE nmAluno = :LOGIN AND cdSenha = :PASSWORD", array(
                ":LOGIN"=>$login,
                ":PASSWORD"=>$password
            ));

            if(count($results) > 0){
                $this->setData($results[0]);
                echo "entrou";
            }
            else{
               throw new Exception("Login e/ou senha inválidos"); 
            }

        }
        public function setData($data){
            $this->setRA($data['cdAluno']);
            $this->setNome($data['nmAluno']);
            $this->setSobrenome("");
            $this->setDataNascimento("");
            $this->setIdade();
            $this->setEndereco($data['nmEndereco']);
            $this->setSenha($data['cdSenha']);
            
        }

        public function insert(){
            $sql = new Sql();

            $results = $sql->select("CALL sp_alunos_insert(:LOGIN, :PASSWORD)", array(
                ':LOGIN'=>$this->getNome(),
                ':PASSWORD'=>$this->getSenha()
            ));

            if(count($results) > 0){
                $this->setData($results[0]);
            }
        }

        public function update($login, $password){
            $sql = new Sql();
            
            $this->setNome($login);
            $this->setSenha($password);

            $sql->query("UPDATE aluno SET nmAluno = :LOGIN, cdSenha = :PASSWORD WHERE cdAluno = :ID", array(
                ':LOGIN'=>$this->getNome(),
                ':PASSWORD'=>$this->getSenha(),
                ':ID'=>$this->getCodigo()
            ));
        }

        public function delete(){
            $sql = new Sql();

            $sql->query("DELETE FROM aluno WHERE cdAluno = :ID", array(
                ":ID"=>$this->getCodigo()
            ));

            $this->setCodigo(0);
            $this->setNome("");
            $this->setSenha("");
            $this->setEndereco("");
            $this->setDataNascimento("");

        }
    }

    //--exemplo de herança
    //--variaveis com protect só pode ser visto por herança e pela propria classe
    // class Pessoa extends Alunos{

    // }

    
?>