-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2021 às 02:21
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
create database db_scambio;
use db_scambio;
--
-- Banco de dados: `db_scambio`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cadastraUsuario` (IN `nome` VARCHAR(150), IN `senha` VARCHAR(100), IN `celular` VARCHAR(20), IN `datanasc` DATE, IN `email` VARCHAR(100), IN `cep` INT, IN `rua` VARCHAR(100), IN `bairro` VARCHAR(50), IN `cidade` VARCHAR(50), IN `uf` CHAR(2), `numerocasa` INT)  begin 
	declare pcidade int;    
    declare pestado int;
    declare pbairro int;
    declare plog int;
    set pestado = (select cd_uf from tb_uf where sg_uf = uf);
		if exists(select * from tb_cidade where nm_cidade = cidade and cd_uf = pestado) then
			set pcidade = (select cd_cidade from tb_cidade where nm_cidade = cidade and cd_uf = pestado);
		else
			insert into tb_cidade(nm_cidade, cd_uf) values (cidade, pestado);
            set pcidade = (select cd_cidade from tb_cidade where nm_cidade = cidade and cd_uf = pestado);
		end if;     
		if exists(select * from tb_bairro where nm_bairro = bairro and cd_cidade = pcidade) then
			set pbairro = (select cd_bairro from tb_bairro where nm_bairro = bairro and cd_cidade = pcidade);
		else
			insert into tb_bairro(nm_bairro, cd_cidade) values (bairro, pcidade);
            set pbairro = (select cd_bairro from tb_bairro where nm_bairro = bairro and cd_cidade = pcidade);
		end if;
        if exists(select * from tb_logradouro where cd_cep = cep and cd_bairro = pbairro) then
			set plog = (select cd_logradouro from tb_logradouro where cd_cep = cep and cd_bairro = pbairro);
		else 
			insert into tb_logradouro(nm_logradouro, cd_cep, cd_casa, cd_bairro) values (rua, cep, numerocasa, pbairro);
            set plog = (select cd_logradouro from tb_logradouro where cd_cep = cep and cd_bairro = pbairro);
		end if;
        insert into tb_usuario 
        (nm_usuario, cd_celular, dt_nascimento, nm_email, nm_senha, cd_logradouro) values
		(nome, celular, datanasc, email, senha, plog);     
 end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_anuncio`
--

CREATE TABLE `tb_anuncio` (
  `cd_anuncio` int(11) NOT NULL,
  `ds_anuncio` varchar(1000) DEFAULT NULL,
  `dt_anuncio` datetime DEFAULT NULL,
  `ds_img1` varchar(100) DEFAULT NULL,
  `ds_img2` varchar(100) DEFAULT NULL,
  `cd_logradouro` int(11) DEFAULT NULL,
  `cd_livro` int(11) DEFAULT NULL,
  `cd_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_autor`
--

CREATE TABLE `tb_autor` (
  `cd_autor` int(11) NOT NULL,
  `nm_autor` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bairro`
--

CREATE TABLE `tb_bairro` (
  `cd_bairro` int(11) NOT NULL,
  `nm_bairro` varchar(50) DEFAULT NULL,
  `cd_cidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_bairro`
--

INSERT INTO `tb_bairro` (`cd_bairro`, `nm_bairro`, `cd_cidade`) VALUES
(1, 'Jockey Club', NULL),
(2, 'Náutica', 5426),
(3, 'Alto da Balança', 5427);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cidade`
--

CREATE TABLE `tb_cidade` (
  `cd_cidade` int(11) NOT NULL,
  `nm_cidade` varchar(50) DEFAULT NULL,
  `cd_uf` int(11) DEFAULT NULL,
  `ibgd` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cidade`
--

INSERT INTO `tb_cidade` (`cd_cidade`, `nm_cidade`, `cd_uf`, `ibgd`) VALUES
(5426, 'São Vicente', 25, NULL),
(5427, 'Fortaleza', 6, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conversa`
--

CREATE TABLE `tb_conversa` (
  `cd_conversa` int(11) NOT NULL,
  `cd_usuarioOn` int(11) DEFAULT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `nm_visto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_editora`
--

CREATE TABLE `tb_editora` (
  `cd_editora` int(11) NOT NULL,
  `nm_editora` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livro`
--

CREATE TABLE `tb_livro` (
  `cd_livro` int(11) NOT NULL,
  `nm_livro` varchar(100) DEFAULT NULL,
  `dt_lancamento` date DEFAULT NULL,
  `cd_editora` int(11) DEFAULT NULL,
  `cd_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_logradouro`
--

CREATE TABLE `tb_logradouro` (
  `cd_logradouro` int(11) NOT NULL,
  `nm_logradouro` varchar(100) DEFAULT NULL,
  `cd_cep` varchar(15) DEFAULT NULL,
  `cd_bairro` int(11) DEFAULT NULL,
  `cd_casa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_logradouro`
--

INSERT INTO `tb_logradouro` (`cd_logradouro`, `nm_logradouro`, `cd_cep`, `cd_bairro`, `cd_casa`) VALUES
(1, 'av asdsad', '11365', NULL, 1073),
(2, 'av asdsad', '11365', 2, 1073),
(3, 'Rua Djalma Petit', '60851120', 3, 121);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensagem`
--

CREATE TABLE `tb_mensagem` (
  `cd_mensagem` int(11) NOT NULL,
  `ds_mensagem` varchar(1000) DEFAULT NULL,
  `dt_mensagem` datetime DEFAULT NULL,
  `cd_conversa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_uf`
--

CREATE TABLE `tb_uf` (
  `cd_uf` int(11) NOT NULL,
  `sg_uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_uf`
--

INSERT INTO `tb_uf` (`cd_uf`, `sg_uf`) VALUES
(1, 'AC'),
(2, 'AL'),
(3, 'AM'),
(4, 'AP'),
(5, 'BA'),
(6, 'CE'),
(7, 'DF'),
(8, 'ES'),
(9, 'GO'),
(10, 'MA'),
(11, 'MG'),
(12, 'MS'),
(13, 'MT'),
(14, 'PA'),
(15, 'PE'),
(16, 'PI'),
(17, 'PR'),
(18, 'RJ'),
(19, 'RN'),
(20, 'RO'),
(21, 'RR'),
(22, 'RS'),
(23, 'SC'),
(24, 'SE'),
(25, 'SP'),
(26, 'TO'),
(27, 'PB');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cd_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(150) DEFAULT NULL,
  `cd_celular` varchar(20) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `nm_email` varchar(100) DEFAULT NULL,
  `nm_senha` varchar(100) DEFAULT NULL,
  `nm_foto` varchar(100) DEFAULT NULL,
  `cd_logradouro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_usuario`, `nm_usuario`, `cd_celular`, `dt_nascimento`, `nm_email`, `nm_senha`, `nm_foto`, `cd_logradouro`) VALUES
(1, 'Barbara Hellen', '1333333333', '2021-09-09', 'barbara@barbara.com', '213123123', NULL, NULL),
(3, 'Helena Hellen', '1333333333', '2021-09-09', 'barbara@barbarass.com', '213123123', NULL, 2),
(4, 'Barbara Hellen da Silva Pereira', 'qwqw', '2001-09-09', 'barb@gmail.com23', 'qwqw', NULL, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_anuncio`
--
ALTER TABLE `tb_anuncio`
  ADD PRIMARY KEY (`cd_anuncio`),
  ADD KEY `fk_anunc_log` (`cd_logradouro`),
  ADD KEY `fk_anunc_livro` (`cd_livro`),
  ADD KEY `fk_anunc_usuario` (`cd_usuario`);

--
-- Índices para tabela `tb_autor`
--
ALTER TABLE `tb_autor`
  ADD PRIMARY KEY (`cd_autor`);

--
-- Índices para tabela `tb_bairro`
--
ALTER TABLE `tb_bairro`
  ADD PRIMARY KEY (`cd_bairro`),
  ADD KEY `fk_bairro_cidade` (`cd_cidade`);

--
-- Índices para tabela `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD PRIMARY KEY (`cd_cidade`),
  ADD KEY `fk_cidade_uf` (`cd_uf`);

--
-- Índices para tabela `tb_conversa`
--
ALTER TABLE `tb_conversa`
  ADD PRIMARY KEY (`cd_conversa`),
  ADD KEY `fk_conversa_usuario` (`cd_usuario`);

--
-- Índices para tabela `tb_editora`
--
ALTER TABLE `tb_editora`
  ADD PRIMARY KEY (`cd_editora`);

--
-- Índices para tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD PRIMARY KEY (`cd_livro`),
  ADD KEY `fk_livro_editora` (`cd_editora`),
  ADD KEY `fk_livro_autor` (`cd_autor`);

--
-- Índices para tabela `tb_logradouro`
--
ALTER TABLE `tb_logradouro`
  ADD PRIMARY KEY (`cd_logradouro`),
  ADD KEY `fk_logradouro_bairro` (`cd_bairro`);

--
-- Índices para tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD PRIMARY KEY (`cd_mensagem`),
  ADD KEY `fk_mensagem_conversa` (`cd_conversa`);

--
-- Índices para tabela `tb_uf`
--
ALTER TABLE `tb_uf`
  ADD PRIMARY KEY (`cd_uf`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_usuario`),
  ADD UNIQUE KEY `uk_email` (`nm_email`),
  ADD KEY `fk_usuario_log` (`cd_logradouro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_anuncio`
--
ALTER TABLE `tb_anuncio`
  MODIFY `cd_anuncio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_autor`
--
ALTER TABLE `tb_autor`
  MODIFY `cd_autor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_bairro`
--
ALTER TABLE `tb_bairro`
  MODIFY `cd_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_cidade`
--
ALTER TABLE `tb_cidade`
  MODIFY `cd_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5428;

--
-- AUTO_INCREMENT de tabela `tb_conversa`
--
ALTER TABLE `tb_conversa`
  MODIFY `cd_conversa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_editora`
--
ALTER TABLE `tb_editora`
  MODIFY `cd_editora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  MODIFY `cd_livro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_logradouro`
--
ALTER TABLE `tb_logradouro`
  MODIFY `cd_logradouro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  MODIFY `cd_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_uf`
--
ALTER TABLE `tb_uf`
  MODIFY `cd_uf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_anuncio`
--
ALTER TABLE `tb_anuncio`
  ADD CONSTRAINT `fk_anunc_livro` FOREIGN KEY (`cd_livro`) REFERENCES `tb_livro` (`cd_livro`),
  ADD CONSTRAINT `fk_anunc_log` FOREIGN KEY (`cd_logradouro`) REFERENCES `tb_logradouro` (`cd_logradouro`),
  ADD CONSTRAINT `fk_anunc_usuario` FOREIGN KEY (`cd_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_bairro`
--
ALTER TABLE `tb_bairro`
  ADD CONSTRAINT `fk_bairro_cidade` FOREIGN KEY (`cd_cidade`) REFERENCES `tb_cidade` (`cd_cidade`);

--
-- Limitadores para a tabela `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD CONSTRAINT `fk_cidade_uf` FOREIGN KEY (`cd_uf`) REFERENCES `tb_uf` (`cd_uf`);

--
-- Limitadores para a tabela `tb_conversa`
--
ALTER TABLE `tb_conversa`
  ADD CONSTRAINT `fk_conversa_usuario` FOREIGN KEY (`cd_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD CONSTRAINT `fk_livro_autor` FOREIGN KEY (`cd_autor`) REFERENCES `tb_autor` (`cd_autor`),
  ADD CONSTRAINT `fk_livro_editora` FOREIGN KEY (`cd_editora`) REFERENCES `tb_editora` (`cd_editora`);

--
-- Limitadores para a tabela `tb_logradouro`
--
ALTER TABLE `tb_logradouro`
  ADD CONSTRAINT `fk_logradouro_bairro` FOREIGN KEY (`cd_bairro`) REFERENCES `tb_bairro` (`cd_bairro`);

--
-- Limitadores para a tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD CONSTRAINT `fk_mensagem_conversa` FOREIGN KEY (`cd_conversa`) REFERENCES `tb_conversa` (`cd_conversa`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_usuario_log` FOREIGN KEY (`cd_logradouro`) REFERENCES `tb_logradouro` (`cd_logradouro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
