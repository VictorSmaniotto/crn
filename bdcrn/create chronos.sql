-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `chronos` DEFAULT CHARACTER SET utf8 ;
USE `chronos` ;


-- -----------------------------------------------------
-- Table `chronos`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`cursos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'identificador único de turmas ',
  `nome_curso` VARCHAR(200) NOT NULL COMMENT 'Nome do curso',
  `descricao` TEXT NULL COMMENT 'Descrição sobre o curso',
  `situacao` INT UNSIGNED NOT NULL COMMENT 'Indica se o curso está ativo ou não para a seleção',
  `data_cadastro` TIMESTAMP NOT NULL,
  CONSTRAINT pk_curso
  	PRIMARY KEY (id)),
  	
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `chronos`.`usuarios`
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `chronos`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`usuarios` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL COMMENT 'Nome completo do usuario',
  `email` VARCHAR(100) NOT NULL COMMENT 'O email para login do usuario',
  `senha` TEXT NOT NULL COMMENT 'senha criptografada do usuario',
  `tipo_usuario` ENUM('Admin', 'SuperUser', 'Professor', 'Aluno', 'Visitante') NOT NULL COMMENT 'Define qual o tipo de usuário do sistema',
  `foto` VARCHAR(200) NULL COMMENT 'armezena a url da foto de perfil',
  `situacao` ENUM('Ativo', 'Inativo') NOT NULL COMMENT 'Define a situação do cadastro do usuário',
  `data_cadastro` TIMESTAMP NOT NULL COMMENT 'Quando o usuário foi cadastrado',
  CONSTRAINT pk_usuario
  PRIMARY KEY (id));






-- -----------------------------------------------------
-- Table `chronos`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`categorias` (
  `idcategoria` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_categoria` VARCHAR(255) NOT NULL,
  `data_cadastro` TIMESTAMP NOT NULL,
	CONSTRAINT pk_categoria
	PRIMARY KEY (idcategoria);


-- -----------------------------------------------------
-- Table `chronos`.`projetos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`projetos` (
  `idprojeto` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificação única do projeto',
  `nome_projeto` VARCHAR(255) NOT NULL COMMENT 'Nome do Projeto',
  `descricao` TEXT NULL COMMENT 'Descrição sobre o projeto',
  `objetivo` TEXT NULL,
  `data_criacao` DATE NOT NULL,
  `data_entrega` DATE NULL COMMENT 'Define quando o projeto foi finalizado e entregue',
  `situacao` ENUM('Em Andamento', 'Finalizado') NOT NULL COMMENT 'Define como está a situação atual do projeto',
  `capa` VARCHAR(255) NULL COMMENT 'armazena o caminho da capa do projeto',
  `idcategoria` INT UNSIGNED NOT NULL COMMENT 'ID da categoria da tabela categorias',
  `data_cadastro` TIMESTAMP NOT NULL,
	CONSTRAINT pk_projeto
	PRIMARY KEY (idprojeto);


-- -----------------------------------------------------
-- Table `chronos`.`midias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`midias` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificação única do registro mídia',
  `tipo_midia` VARCHAR(45) NOT NULL COMMENT 'Define o tipo da mídia',
  `caminho` TEXT NOT NULL COMMENT 'Informa qual o caminho para encontrar a mídia',
  `data_cadastro` DATE NOT NULL COMMENT 'Data de cadastro da mídia',
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`etapas_projetos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`etapas_projetos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador único das etapas dos projetos',
  `titulo` VARCHAR(200) NOT NULL COMMENT 'titulo da etapa que vai para a publicação',
  `descricao` TEXT NOT NULL COMMENT 'Descrição do projeto para publicação',
  `status` INT UNSIGNED NOT NULL COMMENT 'status de como está a etapa, publicada ou não',
  `data_inicio` DATE NOT NULL COMMENT 'Data de quando a etapa foi iniciada',
  `data_fim` DATE NOT NULL COMMENT 'Data de quando a etapa foi finalizada',
  `idprojeto` BIGINT UNSIGNED NOT NULL COMMENT 'Identificação do projeto que a etapa pertence',
  `idmidias` BIGINT UNSIGNED NULL COMMENT 'ID das mídias que poderão ser utilizadas da tabela midias ',
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`mural_pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`mural_pedidos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(200) NOT NULL,
  `descricao` TEXT NOT NULL,
  `data_cadastro` TIMESTAMP NOT NULL,
  `idusuario` BIGINT UNSIGNED NOT NULL,
  `idmidia` BIGINT UNSIGNED NULL,
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`comentarios` (
  `idcomentario` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `idusuario` BIGINT UNSIGNED NOT NULL,
  `data_cadastro` TIMESTAMP NOT NULL,
ENGINE = InnoDB;


chronoschronos