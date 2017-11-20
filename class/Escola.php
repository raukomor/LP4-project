<?php
    class Escola{
        private $cd_escola;
        private $nm_escola;
        private $nm_endereco_escola;
        private $cd_telefone_escola;

        //construtor

        public function __construct($nm_escola = null,$nm_endereco_escola = null,$cd_telefone_escola = null){
            $this->cd_escola = null;
            $this->nm_escola = $nm_escola;
            $this->nm_endereco_escola = $nm_endereco_escola;
            $this->cd_telefone_escola = $cd_telefone_escola;
        }
        
        public function getCd_escola(){
            return $this->cd_escola;
        }

        public function setCd_escola($value){
            $this->cd_escola = $value;
        }
        
        public function getNm_escola(){
            return $this->nm_escola;
        }

        public function setNm_escola($value){
            $this->nm_escola = $value;
        }

        public function getNm_endereco_escola(){
            return $this->nm_endereco_escola;
        }

        public function setNm_endereco_escola($value){
            $this->nm_endereco_escola = $value;
        }

        public function getCd_telefone_escola(){
            return $this->cd_telefone_escola;
        }

        public function setCd_telefone_escola($value){
            $this->cd_telefone_escola = $value;
        }

        //quando der echo no objeto, vai retorna esse metodo
        public function __toString(){
            return json_encode(array(
                "cd_escola"=>$this->getCd_escola(),
                "nm_escola"=>$this->getNm_escola(),
                "nm_endereco_escola"=>$this->getNm_endereco_escola(),
                "cd_telefone_escola"=>$this->getCd_telefone_escola()
            ));
        }

        // retirar objeto da memoria no final da execução(exibição de uma mensagem)
        public function __destruct(){
            //var_dump("DESTRUIR");
        }

        public function loadById($id){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM escola WHERE cd_escola = :ID", array(
                ":ID"=>$id
            ));
    
            if(count($results) > 0){
                $this->setData($results[0]);
            }
        }

        public function getList(){
            $sql = new Sql();

            return $sql->select("SELECT * FROM escola ORDER BY nm_escola;");
        }

        public function search($nome){
            $sql = new Sql();

            return $sql->select("SELECT * FROM escola WHERE nm_escola Like :SEARCH ORDER BY nm_escola",array(
                ":SEARCH"=>"%".$nome."%"
            ));
        }

        // public function login($login,$password){
        //     $sql = new Sql();
        //     $results = $sql->select("SELECT * FROM aluno WHERE nmAluno = :LOGIN AND cdSenha = :PASSWORD", array(
        //         ":LOGIN"=>$login,
        //         ":PASSWORD"=>$password
        //     ));

        //     if(count($results) > 0){
        //         $this->setData($results[0]);
        //         echo "entrou";
        //     }
        //     else{
        //        throw new Exception("Login e/ou senha inválidos"); 
        //     }

        // }
        public function setData($data){
            $this->setCd_escola($data['cd_escola']);           
            $this->setNm_escola($data['nm_escola']);           
            $this->setNm_endereco_escola($data['nm_endereco_escola']);           
            $this->setCd_telefone_escola($data['cd_telefone_escola']);           
        }

        public function insert(){
            $sql = new Sql();

            $results = $sql->select("CALL sp_escola_insert(:NM_ESCOLA, :NM_ENDERECO_ESCOLA, :CD_TELEFONE_ESCOLA)", array(
                ':NM_ESCOLA'=>$this->getNm_escola(),
                ':NM_ENDERECO_ESCOLA'=>$this->getNm_endereco_escola(),
                ':CD_TELEFONE_ESCOLA'=>$this->getCd_telefone_escola()
            ));

            if(count($results) > 0){
                $this->setData($results[0]);
            }
        }

        public function update($cd_escola,$nm_escola,$nm_endereco_escola,$cd_telefone_escola){
            $sql = new Sql();
            
            $this->loadById($cd_escola);

            //$this->setCd_escola($cd_escola); 
            $this->setNm_escola($nm_escola);
            $this->setNm_endereco_escola($nm_endereco_escola);
            $this->setCd_telefone_escola($cd_telefone_escola);
            

            $sql->query("UPDATE escola SET nm_escola = :NM_ESCOLA, nm_endereco_escola = :NM_ENDERECO_ESCOLA, cd_telefone_escola = :CD_TELEFONE_ESCOLA WHERE cd_escola = :CD_ESCOLA", array(
                ':NM_ESCOLA'=>$this->getNm_escola(),
                ':NM_ENDERECO_ESCOLA'=>$this->getNm_endereco_escola(),
                ':CD_TELEFONE_ESCOLA'=>$this->getCd_telefone_escola(),
                ':CD_ESCOLA'=>$this->getCd_escola()
            ));
        }

        public function delete($cd_escola){
            $sql = new Sql();
            
            $this->loadById($cd_escola);

            $sql->query("DELETE FROM escola WHERE cd_escola = :CD_ESCOLA", array(
                ":CD_ESCOLA"=>$this->getCd_escola()
            ));

            $this->setCd_escola(0);           
            $this->setNm_escola("");           
            $this->setNm_endereco_escola("");           
            $this->setCd_telefone_escola(null);    

        }
    }

?>