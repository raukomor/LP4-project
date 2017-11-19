CREATE DATABASE SISTEMA_ESCOLA;

CREATE TABLE PROFESSOR(
cd_cpf_professor INT(11) PRIMARY KEY,
nm_professor VARCHAR(40) NOT NULL,
cd_telefone_professor INT(11) NOT NULL,
nm_endereco_professor VARCHAR(70) NOT NULL,
dt_nascimento_professor DATE NOT NULL);

CREATE TABLE ESCOLA(
cd_escola INTEGER PRIMARY KEY auto_increment,
nm_escola VARCHAR(50) NOT NULL,
nm_endereco_escola VARCHAR(70) NOT NULL,
cd_telefone_escola INT(11) NOT NULL);

CREATE TABLE TURMA(
cd_turma INTEGER PRIMARY KEY auto_increment,
nm_periodo_turma VARCHAR(10) NOT NULL,
sg_sala_turma CHAR(5) NOT NULL,
aa_escolar_turma INT(1) NOT NULL,
cd_escola INTEGER NOT NULL);

CREATE TABLE PROFESSOR_ESCOLA(
cd_ingrecao INTEGER PRIMARY KEY auto_increment,
dt_ingrecao DATE NOT NULL,
cd_cpf_professor INTEGER,
cd_escola INTEGER,
CONSTRAINT FK_ingrecao_professor FOREIGN KEY(cd_cpf_professor) REFERENCES PROFESSOR (cd_cpf_professor),
CONSTRAINT FK_ingrecao_escola FOREIGN KEY(cd_escola) REFERENCES ESCOLA (cd_escola));

CREATE TABLE PROFESSOR_TURMA(
cd_ingrecao INTEGER PRIMARY KEY auto_increment,
dt_ingrecao DATE NOT NULL,
cd_cpf_professor INTEGER,
cd_turma INTEGER,
CONSTRAINT FK_ingrecao_professor2 FOREIGN KEY(cd_cpf_professor) REFERENCES PROFESSOR (cd_cpf_professor),
CONSTRAINT FK_ingrecao_turma FOREIGN KEY(cd_turma) REFERENCES TURMA (cd_turma));

CREATE TABLE ALUNO (
cd_cpf_aluno INTEGER(11) PRIMARY KEY,
nm_aluno VARCHAR(40) NOT NULL,
cd_telefone_aluno INT(11) NOT NULL,
nm_endereco_aluno VARCHAR(70) NOT NULL,
dt_nascimento_aluno DATE NOT NULL,
cd_escola INTEGER NOT NULL,
cd_turma INTEGER NOT NULL,
dt_matricula DATE NOT NULL,
CONSTRAINT FK_matricula_escola FOREIGN KEY(cd_escola) REFERENCES ESCOLA (cd_escola),
CONSTRAINT FK_matricula_turma FOREIGN KEY(cd_turma) REFERENCES TURMA (cd_turma));