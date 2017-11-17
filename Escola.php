<?php
    class Escola{
        private $codigo;
        private $nome;
        private $endereco;
        private $cep;

        //construtor

        public function __construct(/*$codigo,*/ $nome, $cep, $endereco){
            $this->codigo = 0;
            $this->nome = $nome;
            $this->cep = $cep;
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

        public function getCep(){
            return $this->cep;
        }

        public function setCep($cep){
            $this->cep = $cep;
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
                "cep"=>$this->getCep(),
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

    $novaEscola = new Escola("Martim Afonso","11340-010","Rua VII");
     $xyz->setNome("Martim Afonso");
     $xyz->setCep("11340-010");
     $xyz->setEndereco("rua VII");
    
    var_dump($novaEscola->exibir());
    echo $novaEscola;
    unset($novaEscola);
?>