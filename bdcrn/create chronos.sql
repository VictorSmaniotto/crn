-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema chronos
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `chronos` ;

-- -----------------------------------------------------
-- Schema chronos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `chronos` DEFAULT CHARACTER SET utf8 ;
USE `chronos` ;

-- -----------------------------------------------------
-- Table `chronos`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`empresas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador único da empresa',
  `razaosocial` VARCHAR(100) NOT NULL COMMENT 'razão social da empresa - nome da empresa',
  `cnpj` VARCHAR(18) NOT NULL,
  `nome_empresa` VARCHAR(150) NULL COMMENT 'Nome da Empresa',
  `email` VARCHAR(100) NULL COMMENT 'Email da empresa',
  `cidade` VARCHAR(45) NULL COMMENT 'recebe o id da tabela cidades',
  `tipo_logradouro` VARCHAR(45) NULL COMMENT 'Recebe o tipo do logradouro, por exemplo Rua, Avenida, Estrada, etc.',
  `logradouro` VARCHAR(150) NULL COMMENT 'Nome do Logradouro',
  `numero` VARCHAR(10) NULL COMMENT 'Número do endereço da empresa',
  `bairro` VARCHAR(150) NULL COMMENT 'Bairro do endereço',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`telefones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`telefones` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificação única do telefone',
  `telefone` VARCHAR(45) NOT NULL COMMENT 'número do telefone',
  `idempresa` INT UNSIGNED NOT NULL COMMENT 'Identificação única da empresa na tabela empresas',
  PRIMARY KEY (`id`),
  INDEX `fk_telefones_empresas_idx` (`idempresa` ASC) VISIBLE,
  CONSTRAINT `fk_telefones_empresas`
    FOREIGN KEY (`idempresa`)
    REFERENCES `chronos`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`salas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`salas` (
  `idsalas` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificação única das salas',
  `tipo_sala` VARCHAR(100) NOT NULL COMMENT 'define o tipo da sala (laboratório, cinema, estética)',
  `descricao` VARCHAR(100) NOT NULL COMMENT 'Identifica a sala, recebe um valor de texto para diferentes descrições além de números.',
  `capacidade` INT NOT NULL,
  `disponivel` ENUM('SIM', 'NÃO') NOT NULL COMMENT 'Define a disponibilidade da sala',
  `data_cadastro` TIMESTAMP NOT NULL COMMENT 'data em que o registro foi cadastrado',
  `idempresa` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idsalas`),
  INDEX `fk_salas_empresas_idx` (`idempresa` ASC) VISIBLE,
  CONSTRAINT `fk_salas_empresas`
    FOREIGN KEY (`idempresa`)
    REFERENCES `chronos`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`cursos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'identificador único de turmas ',
  `nome_curso` VARCHAR(200) NOT NULL COMMENT 'Nome do curso',
  `descricao` TEXT NULL COMMENT 'Descrição sobre o curso',
  `situacao` ENUM('Ativo', 'Inativo') NOT NULL COMMENT 'Indica se o curso está ativo ou não para a seleção',
  `data_cadastro` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`turmas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`turmas` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador único da turma',
  `data_inicio` DATE NOT NULL COMMENT 'Data de início da turma',
  `data_fim` DATE NOT NULL COMMENT 'Data prevista para o fim da turma',
  `idsala` INT UNSIGNED NOT NULL COMMENT 'ID da sala da tabela salas',
  `idcurso` INT UNSIGNED NOT NULL COMMENT 'ID do curso da tabela cursos',
  `data_cadastro` TIMESTAMP NOT NULL COMMENT 'Data em que a turma foi cadastrada',
  PRIMARY KEY (`id`),
  INDEX `fk_turmas_salas_idx` (`idsala` ASC) VISIBLE,
  INDEX `fk_turmas_cursos_idx` (`idcurso` ASC) VISIBLE,
  CONSTRAINT `fk_turmas_salas`
    FOREIGN KEY (`idsala`)
    REFERENCES `chronos`.`salas` (`idsalas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmas_cursos`
    FOREIGN KEY (`idcurso`)
    REFERENCES `chronos`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`usuarios` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL COMMENT 'Nome completo do usuario',
  `data_nascimento` DATE NOT NULL COMMENT 'Data de nascimeto do usuario',
  `cpf` CHAR(11) NOT NULL COMMENT 'Único por usuário, auxiliar de identificação para usuários não alunos',
  `email` VARCHAR(100) NOT NULL COMMENT 'O email para login do usuario',
  `senha` TEXT NOT NULL COMMENT 'senha criptografada do usuario',
  `ra_aluno` VARCHAR(10) NULL COMMENT 'Armazena o RA (Registro do Aluno) do aluno da Secretaria da Educação ',
  `tipo_usuario` ENUM('Admin', 'SuperUser', 'Professor', 'Aluno', 'Visitante') NOT NULL COMMENT 'Define qual o tipo de usuário do sistema',
  `foto` VARCHAR(200) NULL COMMENT 'armezena a url da foto de perfil',
  `situacao` ENUM('Ativo', 'Inativo') NOT NULL COMMENT 'Define a situação do cadastro do usuário',
  `data_cadastro` TIMESTAMP NOT NULL COMMENT 'Quando o usuário foi cadastrado',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`usuario_turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`usuario_turma` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificação única da relação entre usuário e turma',
  `idusuario` BIGINT UNSIGNED NOT NULL COMMENT 'Recebe o ID do usuário da tabela usuarios',
  `idturma` BIGINT UNSIGNED NOT NULL COMMENT 'Recebe o id da turma na tabela turmas',
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_turma_usuarios_idx` (`idusuario` ASC) VISIBLE,
  INDEX `fk_usuario_turma_turmas_idx` (`idturma` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_turma_usuarios`
    FOREIGN KEY (`idusuario`)
    REFERENCES `chronos`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_turma_turmas`
    FOREIGN KEY (`idturma`)
    REFERENCES `chronos`.`turmas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`grupos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`grupos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificação única do grupo',
  `nome_grupo` VARCHAR(150) NOT NULL COMMENT 'Nome do grupo criado pelos alunos',
  `descricao` TEXT NULL COMMENT 'Descrição sobre o grupo',
  `data_criacao` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`grupo_usuario_turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`grupo_usuario_turma` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `idusuario_turma` BIGINT UNSIGNED NOT NULL COMMENT 'Recebe o ID único da tabela usuario_turma',
  `idgrupo` BIGINT UNSIGNED NOT NULL COMMENT 'Recebe o ID único da tabela grupo',
  PRIMARY KEY (`id`),
  INDEX `fk_grustu_usuario_turma_idx` (`idusuario_turma` ASC) VISIBLE,
  INDEX `fk_grustu_grupos_idx` (`idgrupo` ASC) VISIBLE,
  CONSTRAINT `fk_grustu_usuario_turma`
    FOREIGN KEY (`idusuario_turma`)
    REFERENCES `chronos`.`usuario_turma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grustu_grupos`
    FOREIGN KEY (`idgrupo`)
    REFERENCES `chronos`.`grupos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`categorias` (
  `idcategoria` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_categoria` VARCHAR(200) NOT NULL,
  `data_cadastro` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`projetos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`projetos` (
  `idprojeto` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificação única do projeto',
  `nome_projeto` VARCHAR(200) NOT NULL COMMENT 'Nome do Projeto',
  `descricao` TEXT NULL COMMENT 'Descrição sobre o projeto',
  `objetivo` TEXT NULL,
  `data_criacao` DATE NOT NULL,
  `data_entrega` DATE NULL COMMENT 'Define quando o projeto foi finalizado e entregue',
  `situacao` ENUM('Em Andamento', 'Finalizado') NOT NULL COMMENT 'Define como está a situação atual do projeto',
  `arquivo` VARCHAR(200) NULL COMMENT 'Armazena a URL para compartilhar o projeto ou download do projeto em formato de arquivo, como PDF',
  `idcategoria` INT UNSIGNED NOT NULL COMMENT 'ID da categoria da tabela categorias',
  `idgrupo` BIGINT UNSIGNED NOT NULL COMMENT 'ID do grupo da tabela grupos',
  `data_cadastro` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idprojeto`),
  INDEX `fk_projetos_grupos_idx` (`idgrupo` ASC) VISIBLE,
  INDEX `fk_projeto_categoria_idx` (`idcategoria` ASC) VISIBLE,
  CONSTRAINT `fk_projetos_grupos`
    FOREIGN KEY (`idgrupo`)
    REFERENCES `chronos`.`grupos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projeto_categoria`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `chronos`.`categorias` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`atividades_projeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`atividades_projeto` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identficação única da atividade',
  `titulo` VARCHAR(200) NOT NULL COMMENT 'Título da atividade',
  `descricao` TEXT NOT NULL COMMENT 'Descrição da Atividade',
  `data_criacao` TIMESTAMP NOT NULL COMMENT 'Data da criação da atividade',
  `data_entrega` TIMESTAMP NULL COMMENT 'Data da entrega da atividade',
  `urgencia` ENUM('Normal', 'Urgente', 'Muito Urgente') NOT NULL COMMENT 'Define a urgencia da entrega da atividade',
  `status` INT NOT NULL COMMENT 'Define o progresso da atividade',
  `prioridade` INT NOT NULL COMMENT 'Define o nível de prioridade da atividade em relação às outras ',
  `idprojeto` BIGINT UNSIGNED NOT NULL COMMENT 'Identifica o projeto da tabela projetos',
  `usuario_criou` BIGINT UNSIGNED NULL COMMENT 'Identifica o usuário que criou a atividade',
  PRIMARY KEY (`id`),
  INDEX `fk_atividade_projeto_idx` (`idprojeto` ASC) VISIBLE,
  CONSTRAINT `fk_atividade_projeto`
    FOREIGN KEY (`idprojeto`)
    REFERENCES `chronos`.`projetos` (`idprojeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`midias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`midias` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificação única do registro mídia',
  `tipo_midia` VARCHAR(45) NOT NULL COMMENT 'Define o tipo da mídia',
  `caminho` TEXT NOT NULL COMMENT 'Informa qual o caminho para encontrar a mídia',
  `data_cadastro` DATE NOT NULL COMMENT 'Data de cadastro da mídia',
  `idatividade` BIGINT UNSIGNED NOT NULL COMMENT 'Identifica a atividade que originou a mídia',
  PRIMARY KEY (`id`),
  INDEX `fk_midia_atividade_idx` (`idatividade` ASC) VISIBLE,
  CONSTRAINT `fk_midia_atividade`
    FOREIGN KEY (`idatividade`)
    REFERENCES `chronos`.`atividades_projeto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  PRIMARY KEY (`id`),
  INDEX `fk_etapa_projeto_idx` (`idprojeto` ASC) VISIBLE,
  INDEX `fk_etapa_midias_idx` (`idmidias` ASC) VISIBLE,
  CONSTRAINT `fk_etapa_projeto`
    FOREIGN KEY (`idprojeto`)
    REFERENCES `chronos`.`projetos` (`idprojeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_etapa_midias`
    FOREIGN KEY (`idmidias`)
    REFERENCES `chronos`.`midias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `idcategoria` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_mural_pedidos_usuario_idx` (`idusuario` ASC) VISIBLE,
  INDEX `fk_mural_pedidos_categoria_idx` (`idcategoria` ASC) VISIBLE,
  CONSTRAINT `fk_mural_pedidos_usuario`
    FOREIGN KEY (`idusuario`)
    REFERENCES `chronos`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mural_pedidos_categoria`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `chronos`.`categorias` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`mural_midias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`mural_midias` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificação única da mídia',
  `tipo_midia` VARCHAR(45) NOT NULL COMMENT 'Define o tipo da mídia',
  `caminho` VARCHAR(200) NOT NULL COMMENT 'Define o caminho da mídia',
  `data_cadastro` TIMESTAMP NOT NULL COMMENT 'Data de quando foi cadastrada',
  `idmural` BIGINT UNSIGNED NOT NULL COMMENT 'Identifica o pedido do mural',
  PRIMARY KEY (`id`),
  INDEX `fk_mural_midias_mural_idx` (`idmural` ASC) VISIBLE,
  CONSTRAINT `fk_mural_midias_mural`
    FOREIGN KEY (`idmural`)
    REFERENCES `chronos`.`mural_pedidos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chronos`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chronos`.`comentarios` (
  `idcomentario` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `idusuario` BIGINT UNSIGNED NOT NULL,
  `data_cadastro` TIMESTAMP NOT NULL,
  `idmural` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `fk_comentario_usuario_idx` (`idusuario` ASC) VISIBLE,
  INDEX `fk_comentario_mural_idx` (`idmural` ASC) VISIBLE,
  CONSTRAINT `fk_comentario_usuario`
    FOREIGN KEY (`idusuario`)
    REFERENCES `chronos`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_mural`
    FOREIGN KEY (`idmural`)
    REFERENCES `chronos`.`mural_pedidos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
