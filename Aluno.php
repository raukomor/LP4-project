<?php
    class Aluno{
        private $codigo;
        private $nome;
        private $dataNascimento;
        private $endereco;

        //construtor

        public function __construct(/*$codigo,*/ $nome, $dataNascimento, $endereco){
            $this->codigo = 0;
            $this->nome = $nome;
            $this->dataNascimento = $dataNascimento;
            $this->endereco = $endereco;
        }
        
        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo(){
            // diferenciado
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
            return $this->nome.", ".$this->dataNascimento.", ".$this->endereco;
        }

        // retirar objeto da memoria no final da execução(exibição de uma mensagem)
        public function __destruct(){
            var_dump("DESTRUIR");
        }
    }

    //--exemplo de herança
    //--variaveis com protect só pode ser visto por herança e pela propria classe
    // class Pessoa extends Alunos{

    // }

    $novoAluno = new Aluno("Rodrigo","26/09/1997","Rua são Caetano");
    // $batata->setNome("Rodrigo");
    // $batata->setEndereco("Rua Batata");
    // $batata->setDataNascimento("26/09/2017");
    
    var_dump($novoAluno->exibir());
    echo $novoAluno;
    unset($novoAluno);
?>