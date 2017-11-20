<?php
    class Pessoa{
        private $nome;
        private $sobrenome;
        private $dataNascimento;
        private $idade;
        private $endereco;

        // public function __construct($nome,$sobrenome,$dataNascimento){
        //     $this->nome = $nome;
        //     $this->sobrenome = $sobrenome;
        //     $this->dataNascimento = $dataNascimento;
        //     $this->idade = $this->gerarIdade();
        // }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($value){
            $this->nome = $value;
        }
        
        public function getSobrenome(){
            return $this->sobrenome;
        }

        public function setSobrenome($value){
            $this->sobrenome = $value;
        }
        
        public function getDataNascimento(){
            return $this->dataNascimento;
        }

        public function setDataNascimento($value){
            $this->dataNascimento = $value;
        }
        
        public function getIdade(){
            return $this->idade;
        }

        public function setIdade(){
            $this->idade = $this->gerarIdade();
        }
        
        public function gerarIdade(){
            $ti = explode("/", $this->getDataNascimento());
            //var_dump($ti);
            if(isset($this->getDataNascimento)){
                if(date('m') >= $ti[1]){
                    if(date('d') < $ti[0]){
                        $inc = date('Y') - $ti[2];
                        return $inc - 1;
                    }
                    else{
                        return date('Y') - $ti[2];
                    }
                }
                else{
                    return date('Y') - $ti[2];
                }
                //print_r($ti);
            }
                
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($value){
            $this->endereco = $value;
        }
        
        public function __toString(){
            return $this->nome."</br>".$this->sobrenome."</br>".$this->dataNascimento."</br>".$this->idade."</br>";
        }

        
    }
?>