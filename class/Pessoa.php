<?php
class Pessoa{
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $idade;

    public function __construct($nome,$sobrenome,$dataNascimento){
        //remover warning do date
        error_reporting(E_ERROR | E_PARSE);
        
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->dataNascimento = $dataNascimento;
        $this->idade = $this->gerarIdade();
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome(){
        $this->nome = $nome;
    }
    
    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function setSobrenome(){
        $this->sobrenome = $nome;
    }
    
    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    public function setDataNascimento(){
        $this->dataNascimento = $dataNascimento;
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
    
    public function __toString(){
        return $this->nome."</br>".$this->sobrenome."</br>".$this->dataNascimento."</br>".$this->idade."</br>";
    }

    
}

$batata = new Pessoa("Rodrigo","Corneta","18/11/1997");
error_reporting(E_ERROR | E_PARSE);

//echo date('Y');
//var_dump($batata);
echo $batata;
print_r($batata->gerarIdade());
?>