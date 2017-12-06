<?php
    class Pessoa{
        private $cd_cpf;
        private $nm_pessoa;
        private $dt_nascimento;
        private $nm_endereco;
        private $cd_telefone;

        
        
        public function getCd_cpf(){
            return $this->cd_cpf;
        }

        public function setCd_cpf($value){
            $this->cd_cpf = $value;
        }
        
        public function getNm_pessoa(){
            return $this->nm_pessoa;
        }

        public function setNm_pessoa($value){
            $this->nm_pessoa = $value;
        }
        
        public function getDt_nascimento(){
            return $this->dt_nascimento;
        }

        public function setDt_nascimento($value){
            $this->dt_nascimento = $value;
        }
        
        public function getNm_endereco(){
            return $this->nm_endereco;
        }

        public function setNm_endereco($value){
            $this->nm_endereco = $value;
        }
        

        public function getCd_telefone(){
            return $this->cd_telefone;
        }

        public function setCd_telefone($value){
            $this->cd_telefone = $value;
        }
        
        // public function __toString(){
        //     return $this->nm_pessoa."</br>".$this->nm_sobrenm_pessoa."</br>".$this->dt_nascimento."</br>".$this->ds_idade."</br>";
        // }

        
    }
?>