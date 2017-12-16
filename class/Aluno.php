<?php
    
    
    class Aluno extends Pessoa{
        
        private $im_perfil;
        private $cd_escola;
        private $cd_turma;
        private $dt_matricula;
        private $cd_senha;

        //construtor
        public function __construct($cd_cpf = null, $nm_pessoa = null, $dt_nascimento = null, $nm_endereco = null, $cd_telefone = null,
        $im_perfil = null, $cd_escola = null, $cd_turma = null, $cd_senha = null){
            $this->setCd_cpf($cd_cpf);
            $this->setNm_pessoa($nm_pessoa);
            $this->setDt_nascimento($dt_nascimento);
            $this->setNm_endereco($nm_endereco);
            $this->setCd_telefone($cd_telefone);
            $this->im_perfil = $im_perfil;
            $this->cd_escola = $cd_escola;
            $this->cd_turma = $cd_turma;
            //$this->dt_matricula = $dt_matricula;
            $this->cd_senha = $cd_senha;
        }

        
        
        public function getIm_perfil(){
            return $this->im_perfil;
        }

        public function setIm_perfil($value){
            $this->im_perfil = $value;
        }
        
        public function getCd_escola(){
            return $this->cd_escola;
        }

        public function setCd_escola($value){
            $this->cd_escola = $value;
        }

        public function getCd_turma(){
            return $this->cd_turma;
        }

        public function setCd_turma($value){
            $this->cd_turma = $value;
        }

        public function getDt_matricula(){
            return $this->dt_matricula;
        }

        public function setDt_matricula($value){
            $this->dt_matricula = $value;
        }

        public function getCd_senha(){
            return $this->cd_senha;
        }

        public function setCd_senha($value){
            $this->cd_senha = $value;
        }

        //quando der echo no objeto, vai retorna esse metodo
        public function __toString(){
            return json_encode(array(
                "cd_cpf"=>$this->getCd_cpf(),
                "nm_aluno"=>$this->getNm_Pessoa(),
                "dt_nascimento"=>$this->getDt_nascimento(),
                "nm_endereco"=>$this->getNm_endereco(),
                "cd_telefone"=>$this->getCd_telefone(),
                "im_perfil"=>$this->getIm_perfil(),
                "cd_escola"=>$this->getCd_escola(),
                "cd_turma"=>$this->getCd_turma(),
                "dt_matricula"=>$this->getDt_matricula(),
                "cd_senha"=>$this->getCd_senha()
            ));
        }

        // retirar objeto da memoria no final da execução(exibição de uma mensagem)
        public function __destruct(){
            //var_dump("DESTRUIR");
        }

        public function loadById($id){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM aluno WHERE cd_cpf_aluno = :ID", array(
                ":ID"=>$id
            ));
    
            if(count($results) > 0){
                $this->setData($results[0]);
            }
        }

        public function getList(){
            $sql = new Sql();

            return $sql->select("SELECT * FROM aluno ORDER BY nm_aluno;");
        }

        public function search($nome){
            $sql = new Sql();

            return $sql->select("SELECT * FROM aluno WHERE nm_aluno Like :SEARCH ORDER BY nm_aluno",array(
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
            $this->setCd_cpf($data['cd_cpf_aluno']);
            $this->setNm_pessoa($data['nm_aluno']);
            $this->setDt_nascimento($data['dt_nascimento_aluno']);
            $this->setNm_endereco($data['nm_endereco_aluno']);
            $this->setCd_telefone($data['cd_telefone_aluno']);
            $this->setIm_perfil($data['im_perfil']);
            $this->setCd_escola($data['cd_escola']);
            $this->setCd_turma($data['cd_turma']);
            $this->setDt_matricula($data['dt_matricula']);
            $this->setCd_senha($data['cd_senha']);
        }

        public function insert(){
            $sql = new Sql();

           
            $results = $sql->select("CALL sp_aluno_insert(:CD_CPF, :NM_ALUNO, :IM_PERFIL, :CD_TELEFONE, :NM_ENDERECO, :DT_NASCIMENTO, :CD_ESCOLA, :CD_TURMA, NOW(), :CD_SENHA)", array(
                "CD_CPF"=>$this->getCd_cpf(),
                "NM_ALUNO"=>$this->getNm_Pessoa(),
                "DT_NASCIMENTO"=>$this->getDt_nascimento(),
                "NM_ENDERECO"=>$this->getNm_endereco(),
                "CD_TELEFONE"=>$this->getCd_telefone(),
                "IM_PERFIL"=>$this->getIm_perfil(),
                "CD_ESCOLA"=>$this->getCd_escola(),
                "CD_TURMA"=>$this->getCd_turma(),
                //"DT_MATRICULA"=>$this->getDt_matricula(),
                "CD_SENHA"=>$this->getCd_senha()
            ));

            if(count($results) > 0){
                $this->setData($results[0]);
            }
        }

        public function update($cd_cpf, $nm_pessoa, $dt_nascimento, $nm_endereco, $cd_telefone,
        $im_perfil, $cd_escola, $cd_turma, $cd_senha){
            $sql = new Sql();
            
            $this->loadById($cd_cpf);

            //$this->setCd_escola($cd_escola); 
            $this->setCd_cpf($cd_cpf);
            $this->setNm_pessoa($nm_pessoa);
            $this->setDt_nascimento($dt_nascimento);
            $this->setNm_endereco($nm_endereco);
            $this->setCd_telefone($cd_telefone);
            $this->setIm_perfil($im_perfil);
            $this->setCd_escola($cd_escola);
            $this->setCd_turma($cd_turma);
            $this->setDt_matricula($dt_matricula);
            $this->setCd_senha($cd_senha);

            $sql->query("UPDATE aluno SET nm_aluno = :NM_ALUNO , dt_nascimento_aluno = :DT_NASCIMENTO , nm_endereco_aluno = :NM_ENDERECO , cd_telefone_aluno = :CD_TELEFONE , im_perfil = :IM_PERFIL , cd_escola = :CD_ESCOLA , cd_turma = :CD_TURMA , dt_matricula = NOW() , cd_senha = :CD_SENHA  WHERE cd_cpf_aluno = :CD_CPF", array(
                "CD_CPF"=>$this->getCd_cpf(),
                "NM_ALUNO"=>$this->getNm_Pessoa(),
                "DT_NASCIMENTO"=>$this->getDt_nascimento(),
                "NM_ENDERECO"=>$this->getNm_endereco(),
                "CD_TELEFONE"=>$this->getCd_telefone(),
                "IM_PERFIL"=>$this->getIm_perfil(),
                "CD_ESCOLA"=>$this->getCd_escola(),
                "CD_TURMA"=>$this->getCd_turma(),
                //"DT_MATRICULA"=>$this->getDt_matricula(),
                "CD_SENHA"=>$this->getCd_senha()
            ));
        }

        public static function delete($cd_cpf_aluno){
            $sql = new Sql();
            $aluno = new Aluno();
            $aluno->loadById($cd_cpf_aluno);

            $sql->query("DELETE FROM aluno WHERE cd_cpf_aluno = :CD_CPF", array(
                ":CD_CPF"=>$aluno->getCd_cpf()
            ));

            // $this->setCd_cpf(null);
            // $this->setNm_pessoa("");
            // $this->setDt_nascimento("");
            // $this->setNm_endereco("");
            // $this->setCd_telefone(null);
            // $this->setIm_perfil("");
            // $this->setCd_escola(null);
            // $this->setCd_turma(null);
            // $this->setDt_matricula("");
            // $this->setCd_senha(null);    

        }

        public static function getEscolas(){
            $sql = new Sql();
            
            return $sql->select("SELECT cd_escola, nm_escola FROM escola "
            );
        }
    }

    //--exemplo de herança
    //--variaveis com protect só pode ser visto por herança e pela propria classe
    // class Pessoa extends Alunos{

    // }

    
?>