-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 12, 2021 at 03:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scambio`
--
CREATE DATABASE IF NOT EXISTS `db_scambio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_scambio`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_anunciousuario` (IN `codigo` INT)  BEGIN
		SELECT 
		ANUN.CD_ANUNCIO,
		ANUN.DS_ANUNCIO,
		ANUN.DS_IMG1,
		ANUN.DS_IMG2,
		US.nm_usuario,
		LOC.NM_LOGRADOURO,
		LOC.CD_CASA,
		BAIRRO.NM_BAIRRO,
		CITY.NM_CIDADE,
		UF.SG_UF,
		LIV.NM_LIVRO,
		LIV.DT_LANCAMENTO
	FROM TB_ANUNCIO AS ANUN
	INNER JOIN tb_usuario AS US ON
	ANUN.cd_usuario = US.cd_usuario
	INNER JOIN tb_logradouro AS LOC ON
	US.cd_logradouro = LOC.CD_LOGRADOURO
	INNER JOIN TB_BAIRRO AS BAIRRO ON
	BAIRRO.cd_BAIRRO = LOC.cd_BAIRRO
	INNER JOIN TB_CIDADE AS CITY ON
	CITY.cd_CIDADE = BAIRRO.cd_CIDADE
	INNER JOIN TB_UF AS UF ON
	UF.CD_UF = CITY.CD_UF
	INNER JOIN TB_LIVRO AS LIV ON
	LIV.CD_LIVRO = ANUN.CD_LIVRO
	WHERE CD_ANUNCIO = codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cadastraAutor` (IN `nome` VARCHAR(60))  BEGIN
if exists(select * from tb_autor where nm_autor = nome) then
select * from tb_autor where nm_autor = nome;
else 
	insert into tb_autor(nm_autor) values (nome);
    select * from tb_autor where nm_autor = nome;
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cadastraEditora` (IN `nome` VARCHAR(20))  BEGIN
if exists(select * from tb_editora where nm_editora = nome) then
select cd_editora, nm_editora from tb_editora where nm_editora = nome;
else 
	insert into tb_editora(nm_editora) values (nome);
    select cd_editora, nm_editora from tb_editora where nm_editora = nome;
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cadastraLivro` (IN `nome` VARCHAR(60))  BEGIN
if exists(select * from tb_livro where nm_livro = nome) then
select cd_livro,nm_livro from tb_livro where nm_livro = nome;
else 
	insert into tb_livro(nm_livro) values (nome);
    select cd_livro,nm_livro from tb_livro where nm_livro = nome;
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cadastraPublicacao` (IN `nome` VARCHAR(50), IN `descricaso` VARCHAR(200), IN `genero` VARCHAR(50), IN `autor` VARCHAR(60), IN `fotoo1` VARCHAR(70000), IN `fotoo2` VARCHAR(700000), IN `fotoo3` VARCHAR(700000), IN `usercd` INT(11), IN `dt` DATETIME)  begin 
	insert into tb_livro (
		nm_livro, 
        nm_autor,
        nm_genero, 
        descricao, 
        foto1, 
        foto2, 
        foto3,
        cd_usuario,
        dt_publicacao
    ) values (
		nome, 
        autor,
        genero, 
        descricaso, 
        fotoo1, 
        fotoo2, 
        fotoo3,
        usercd,
        dt
    );
        
 end$$

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
        SELECT * FROM TB_USUARIO;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_calculaIdade` (IN `usuario` INT)  begin 
	declare usu varchar(100);
    set usu = 'select dt_nascimento from tb_usuario WHERE cd_usuario = usuario';
    select usu;
	
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_dataNascUsuario` ()  begin
    SELECT nm_usuario AS Nome, DATE_FORMAT(dt_nascimento, '%d de %M de %Y') AS Nascimento, 
	TIMESTAMPDIFF(YEAR,dt_nascimento,CURDATE()) AS Idade
	FROM tb_usuario
	WHERE  (YEAR(dt_nascimento) + 18) >= (YEAR(NOW()) - 18 );	
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pegaAnunciosQtdRecentes` (IN `qt` INT)  begin
	select * from tb_anuncio where dt_anuncio >= NOW() - INTERVAL qt DAY order by dt_anuncio desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pegaAnunciosUsuario` (IN `email` VARCHAR(100))  begin
 if exists(
	select * from tb_anuncio
    inner join tb_usuario
    on tb_usuario.cd_usuario = tb_anuncio.cd_usuario
    where nm_email = email) then
    select * from tb_anuncio
    inner join tb_usuario
    on tb_usuario.cd_usuario = tb_anuncio.cd_usuario
    where nm_email = email;
    else
     SET @s = 'Usuário não tem anuncios !';
	SIGNAL SQLSTATE '45001' SET MESSAGE_TEXT = @s;
    end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_procuraLivro` (IN `nome` VARCHAR(30))  BEGIN
if exists(select * from tb_livro where nm_livro like concat('%',nome,'%')) then
    SELECT * FROM TB_livro where nm_livro like concat('%',nome,'%');
    else
     SET @s = 'Não há registros  !';
	SIGNAL SQLSTATE '45001' SET MESSAGE_TEXT = @s;
    end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_procuraLivros` (IN `nome` VARCHAR(100))  begin
	select nm_livro, nm_autor, nm_editora from tb_livro
	inner join tb_editora on
	tb_editora.cd_editora = tb_livro.cd_editora
	inner join tb_autor on
	tb_autor.cd_autor = tb_livro.cd_autor
    where nm_livro like concat('%',nome,'%');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_procuraUsuario` (IN `nome` VARCHAR(100))  begin
	if exists(select * from tb_usuario where nm_usuario like concat('%',nome,'%')) then
    SELECT * FROM TB_USUARIO where nm_usuario like concat('%',nome,'%');
    else
     SET @s = 'Não há registros  !';
	SIGNAL SQLSTATE '45001' SET MESSAGE_TEXT = @s;
    end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarioPorBairro` (IN `estado` CHAR(2), IN `cidade` VARCHAR(50), IN `bairro` VARCHAR(50))  begin 
	select nm_usuario, sg_uf, nm_cidade, nm_bairro from tb_usuario 
    inner join tb_logradouro on 
    tb_logradouro.cd_logradouro = tb_usuario.cd_logradouro
    inner join tb_bairro on
    tb_bairro.cd_bairro = tb_logradouro.cd_bairro
    inner join tb_cidade on 
    tb_cidade.cd_cidade = tb_bairro.cd_cidade
    inner join tb_uf on
    tb_uf.cd_uf = tb_cidade.cd_uf
    where sg_uf like concat('%',estado,'%') 
    and nm_cidade like concat('%',cidade,'%')
    and nm_bairro like concat('%',bairro,'%');
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarioPorCep` (IN `cep` VARCHAR(15))  begin
	select nm_usuario, sg_uf, nm_cidade, nm_bairro, cd_cep from tb_usuario 
    inner join tb_logradouro on 
    tb_logradouro.cd_logradouro = tb_usuario.cd_logradouro
    inner join tb_bairro on
    tb_bairro.cd_bairro = tb_logradouro.cd_bairro
    inner join tb_cidade on 
    tb_cidade.cd_cidade = tb_bairro.cd_cidade
    inner join tb_uf on
    tb_uf.cd_uf = tb_cidade.cd_uf
    where cd_cep like concat('%',cep,'%') ;   
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarioPorCidade` (IN `estado` CHAR(2), IN `cidade` VARCHAR(50))  begin 
if (estado != '' and cidade != '') then
	select nm_usuario, sg_uf, nm_cidade from tb_usuario 
    inner join tb_logradouro on 
    tb_logradouro.cd_logradouro = tb_usuario.cd_logradouro 
    inner join tb_bairro on
    tb_bairro.cd_bairro = tb_logradouro.cd_bairro
    inner join tb_cidade on 
    tb_cidade.cd_cidade = tb_bairro.cd_cidade
    inner join tb_uf on
    tb_uf.cd_uf = tb_cidade.cd_uf
    where sg_uf like estado and nm_cidade like concat('%',cidade,'%');
	set estado = (select * from tb_logradouro where sg_uf like estado and nm_cidade like cidade);
    end if;
    if(estado != ' ' and cidade = ' ') then
    select nm_usuario, sg_uf, nm_cidade from tb_usuario 
    inner join tb_logradouro on 
    tb_logradouro.cd_logradouro = tb_usuario.cd_logradouro
    inner join tb_bairro on
    tb_bairro.cd_bairro = tb_logradouro.cd_bairro
    inner join tb_cidade on 
    tb_cidade.cd_cidade = tb_bairro.cd_cidade
    inner join tb_uf on
    tb_uf.cd_uf = tb_cidade.cd_uf
    where sg_uf like estado;
    else if(estado = '' AND cidade = '') then
		SET @s = 'O estado e a cidade não podem ser nulos !';
		SIGNAL SQLSTATE '45001' SET MESSAGE_TEXT = @s;
	end if;
    end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarioPorEstado` (IN `estado` CHAR(2))  begin 
	select nm_usuario, sg_uf from tb_usuario 
    inner join tb_logradouro on 
    tb_logradouro.cd_logradouro = tb_usuario.cd_logradouro
    inner join tb_bairro on
    tb_bairro.cd_bairro = tb_logradouro.cd_bairro
    inner join tb_cidade on 
    tb_cidade.cd_cidade = tb_bairro.cd_cidade
    inner join tb_uf on
    tb_uf.cd_uf = tb_cidade.cd_uf
    where sg_uf = estado;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `autor`
-- (See below for the actual view)
--
CREATE TABLE `autor` (
`NM_AUTOR` varchar(140)
,`NM_LIVRO` varchar(100)
,`NM_EDITORA` varchar(140)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `bairro_user`
-- (See below for the actual view)
--
CREATE TABLE `bairro_user` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `chat_user`
-- (See below for the actual view)
--
CREATE TABLE `chat_user` (
`NM_USUARIO` varchar(150)
,`CD_MENSAGEM` int(11)
,`CD_CONVERSA` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cit_bairro_rua`
-- (See below for the actual view)
--
CREATE TABLE `cit_bairro_rua` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `editora_livro`
-- (See below for the actual view)
--
CREATE TABLE `editora_livro` (
`NM_LIVRO` varchar(100)
,`NM_EDITORA` varchar(140)
);

-- --------------------------------------------------------

--
-- Table structure for table `livro_genero`
--

CREATE TABLE `livro_genero` (
  `cd_livro` int(11) DEFAULT NULL,
  `cd_genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livro_genero`
--

INSERT INTO `livro_genero` (`cd_livro`, `cd_genero`) VALUES
(6, 1),
(30, 1),
(32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `datemessage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `datemessage`) VALUES
(6, 3, 1, 'Oi helena', '2021-10-17 19:12:03'),
(7, 26, 1, 'Oi yago', '2021-10-17 19:12:15'),
(8, 3, 1, 'tudo bem', '2021-10-17 19:17:51'),
(9, 3, 1, 'opa', '2021-10-17 19:18:10'),
(10, 3, 1, 'Tuso ceto?', '2021-10-17 19:22:06'),
(11, 3, 1, 'Eita', '2021-10-17 19:34:15'),
(12, 26, 1, 'Yafo', '2021-10-17 19:34:22'),
(13, 41, 1, 'Oi melissa tudo vem', '2021-10-17 19:58:14'),
(14, 3, 1, 'Oi helena', '2021-10-26 18:51:35'),
(15, 1, 49, 'oii', '2021-10-26 19:31:48'),
(16, 39, 1, 'oi yago', '2021-10-26 19:56:23'),
(17, 47, 1, 'oi', '2021-10-26 20:01:25'),
(18, 47, 1, 'tudo bem', '2021-10-26 20:01:30'),
(19, 47, 1, 'oioi', '2021-10-26 20:01:41'),
(20, 47, 1, 'que', '2021-10-26 20:01:49'),
(21, 3, 1, 'que', '2021-10-26 20:02:40'),
(22, 26, 1, 'oi primo', '2021-10-26 20:02:49'),
(23, 26, 1, 'oi', '2021-10-26 20:04:35'),
(24, 26, 1, 'eai negão', '2021-10-26 20:05:06'),
(25, 26, 1, 'oi', '2021-10-26 20:06:14'),
(26, 49, 1, 'tentando', '2021-10-26 20:06:20'),
(27, 40, 1, 'para com isso', '2021-10-26 20:06:39'),
(28, 49, 1, 'oi rs', '2021-10-26 21:56:43'),
(29, 26, 1, ' eai gatao', '2021-10-26 21:58:28'),
(30, 26, 1, 'roi', '2021-10-26 21:59:28'),
(31, 26, 1, 'oi', '2021-10-26 22:02:30'),
(32, 26, 1, 'alo', '2021-10-26 22:10:21'),
(33, 49, 1, 'a', '2021-10-26 22:11:48'),
(34, 49, 1, 'que', '2021-10-26 22:17:17'),
(35, 39, 1, 'osh kkk', '2021-10-26 22:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_autor`
--

CREATE TABLE `tb_autor` (
  `cd_autor` int(11) NOT NULL,
  `nm_autor` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_autor`
--

INSERT INTO `tb_autor` (`cd_autor`, `nm_autor`) VALUES
(0, 'Julio'),
(1, 'Felipe'),
(54, 'Yago'),
(78, 'Yagof'),
(79, ''),
(80, 'Pan'),
(81, 'ya'),
(82, 'Cinquenta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cidade`
--

CREATE TABLE `tb_cidade` (
  `cd_cidade` int(11) NOT NULL,
  `nm_cidade` varchar(50) DEFAULT NULL,
  `cd_uf` int(11) DEFAULT NULL,
  `ibgd` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cidade`
--

INSERT INTO `tb_cidade` (`cd_cidade`, `nm_cidade`, `cd_uf`, `ibgd`) VALUES
(5426, 'São Vicente', 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_conversa`
--

CREATE TABLE `tb_conversa` (
  `cd_conversa` int(11) NOT NULL,
  `cd_usuarioOn` int(11) DEFAULT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `nm_visto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_editora`
--

CREATE TABLE `tb_editora` (
  `cd_editora` int(11) NOT NULL,
  `nm_editora` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_editora`
--

INSERT INTO `tb_editora` (`cd_editora`, `nm_editora`) VALUES
(1, 'Faust'),
(2, 'Saraiva'),
(3, 'Panico'),
(11, 'pan'),
(12, 'Panini'),
(13, 'Rafael'),
(15, 'pan'),
(16, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_genero`
--

CREATE TABLE `tb_genero` (
  `cd_genero` int(11) NOT NULL,
  `nm_genero` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_genero`
--

INSERT INTO `tb_genero` (`cd_genero`, `nm_genero`) VALUES
(1, 'Romance'),
(2, 'Biografia'),
(3, 'Carta'),
(4, 'Carta'),
(5, 'Chick-Lit'),
(6, 'Conto'),
(7, 'Crônica'),
(8, 'Drama'),
(9, 'Ensaio'),
(10, 'Ficção'),
(11, 'História em Quadrinhos (HQ)'),
(12, 'Lad-Lit'),
(13, 'Literatura Fantástica'),
(14, 'Literatura Infantil'),
(15, 'Literatura Infanto-juvenil'),
(16, 'Literatura Nacional'),
(17, 'Memórias'),
(18, 'New Adult'),
(19, 'Novela'),
(20, 'Poesia'),
(21, 'Realismo Mágico'),
(22, 'Sick-Lit'),
(23, 'New Terror');

-- --------------------------------------------------------

--
-- Table structure for table `tb_livro`
--

CREATE TABLE `tb_livro` (
  `cd_livro` int(11) NOT NULL,
  `nm_livro` varchar(100) DEFAULT NULL,
  `cd_editora` int(11) DEFAULT NULL,
  `cd_autor` int(11) DEFAULT NULL,
  `nm_autor` varchar(60) NOT NULL,
  `foto1` mediumtext NOT NULL,
  `foto2` mediumtext NOT NULL,
  `foto3` mediumtext NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `tb_livrocol` varchar(45) DEFAULT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `nm_genero` tinytext DEFAULT NULL,
  `dt_publicacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_livro`
--

INSERT INTO `tb_livro` (`cd_livro`, `nm_livro`, `cd_editora`, `cd_autor`, `nm_autor`, `foto1`, `foto2`, `foto3`, `descricao`, `tb_livrocol`, `cd_usuario`, `nm_genero`, `dt_publicacao`) VALUES
(6, 'Cinquenta', 1, 1, '', '', '', '', '', NULL, 50, 'Romance', '2021-11-11 22:39:35'),
(30, 'MR.Robot', 0, 1, '', '', '', '', '', NULL, 50, 'Ficção', '2021-11-11 22:42:42'),
(32, 'JOEL JOTA', 0, 1, '', '', '', '', '', NULL, 50, 'Coach', '2021-11-11 22:42:48'),
(33, 'NomeLivro', 0, NULL, 'autor', 'fotoo1', 'fotoo2', 'fotoo3', 'descricaso', NULL, 50, 's', '2021-11-11 22:42:50'),
(34, 'Cinquenta', 0, NULL, 'AAAAAAA ', '', '', '', 'JOSE', NULL, 50, 'Romance', '2021-11-11 22:42:52'),
(83, 'yago', NULL, NULL, 'dasasd', '', '', '', ' sdaasd', NULL, 50, 'Biografia', '2021-11-11 11:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mensagem`
--

CREATE TABLE `tb_mensagem` (
  `cd_mensagem` int(11) NOT NULL,
  `ds_mensagem` varchar(1000) DEFAULT NULL,
  `dt_mensagem` datetime DEFAULT NULL,
  `cd_conversa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_uf`
--

CREATE TABLE `tb_uf` (
  `cd_uf` int(11) NOT NULL,
  `sg_uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_uf`
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
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cd_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(150) DEFAULT NULL,
  `cd_celular` varchar(20) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `nm_email` varchar(100) DEFAULT NULL,
  `nm_senha` varchar(100) DEFAULT NULL,
  `nm_foto` varchar(100) DEFAULT NULL,
  `cd_recuperacao` varchar(6) NOT NULL,
  `exp` int(11) NOT NULL,
  `DS_IMGP` longtext DEFAULT NULL,
  `nm_status` varchar(10) NOT NULL,
  `cd_cidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_usuario`, `nm_usuario`, `cd_celular`, `dt_nascimento`, `nm_email`, `nm_senha`, `nm_foto`, `cd_recuperacao`, `exp`, `DS_IMGP`, `nm_status`, `cd_cidade`) VALUES
(50, 'barbi', NULL, '2001-12-13', 'barbarapereira123@hotmail.com', '1234', NULL, '5996ED', 0, NULL, '1', 5426);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_`
-- (See below for the actual view)
--
CREATE TABLE `user_` (
`NM_USUARIO` varchar(150)
,`NM_EMAIL` varchar(100)
,`CD_CELULAR` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_all_info`
-- (See below for the actual view)
--
CREATE TABLE `user_all_info` (
`CD_USUARIO` int(11)
,`NM_USUARIO` varchar(150)
,`DT_NASCIMENTO` date
,`NM_EMAIL` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_city`
-- (See below for the actual view)
--
CREATE TABLE `user_city` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_public`
-- (See below for the actual view)
--
CREATE TABLE `user_public` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_uf`
-- (See below for the actual view)
--
CREATE TABLE `user_uf` (
);

-- --------------------------------------------------------

--
-- Structure for view `autor`
--
DROP TABLE IF EXISTS `autor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `autor`  AS SELECT `aut`.`nm_autor` AS `NM_AUTOR`, `li`.`nm_livro` AS `NM_LIVRO`, `edi`.`nm_editora` AS `NM_EDITORA` FROM ((`tb_autor` `aut` join `tb_livro` `li` on(`aut`.`cd_autor` = `li`.`cd_autor`)) join `tb_editora` `edi` on(`edi`.`cd_editora` = `li`.`cd_editora`)) ;

-- --------------------------------------------------------

--
-- Structure for view `bairro_user`
--
DROP TABLE IF EXISTS `bairro_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bairro_user`  AS SELECT `us`.`nm_usuario` AS `NM_USUARIO`, `ba`.`nm_bairro` AS `NM_BAIRRO` FROM ((`tb_usuario` `us` join `tb_logradouro` `lo` on(`us`.`cd_logradouro` = `lo`.`cd_logradouro`)) join `tb_bairro` `ba` on(`ba`.`cd_bairro` = `lo`.`cd_bairro`)) ;

-- --------------------------------------------------------

--
-- Structure for view `chat_user`
--
DROP TABLE IF EXISTS `chat_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `chat_user`  AS SELECT `us`.`nm_usuario` AS `NM_USUARIO`, `msg`.`cd_mensagem` AS `CD_MENSAGEM`, `co`.`cd_conversa` AS `CD_CONVERSA` FROM ((`tb_mensagem` `msg` join `tb_conversa` `co` on(`co`.`cd_conversa` = `msg`.`cd_conversa`)) join `tb_usuario` `us` on(`co`.`cd_usuario` = `us`.`cd_usuario`)) ;

-- --------------------------------------------------------

--
-- Structure for view `cit_bairro_rua`
--
DROP TABLE IF EXISTS `cit_bairro_rua`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cit_bairro_rua`  AS SELECT `city`.`nm_cidade` AS `NM_CIDADE`, `ba`.`nm_bairro` AS `NM_BAIRRO`, `lo`.`nm_logradouro` AS `NM_LOGRADOURO` FROM ((`tb_cidade` `city` join `tb_bairro` `ba` on(`city`.`cd_cidade` = `ba`.`cd_cidade`)) join `tb_logradouro` `lo` on(`lo`.`cd_bairro` = `ba`.`cd_bairro`)) ;

-- --------------------------------------------------------

--
-- Structure for view `editora_livro`
--
DROP TABLE IF EXISTS `editora_livro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `editora_livro`  AS SELECT `li`.`nm_livro` AS `NM_LIVRO`, `edi`.`nm_editora` AS `NM_EDITORA` FROM (`tb_livro` `li` join `tb_editora` `edi` on(`li`.`cd_editora` = `edi`.`cd_editora`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_`
--
DROP TABLE IF EXISTS `user_`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_`  AS SELECT `tb_usuario`.`nm_usuario` AS `NM_USUARIO`, `tb_usuario`.`nm_email` AS `NM_EMAIL`, `tb_usuario`.`cd_celular` AS `CD_CELULAR` FROM `tb_usuario` ;

-- --------------------------------------------------------

--
-- Structure for view `user_all_info`
--
DROP TABLE IF EXISTS `user_all_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_all_info`  AS SELECT `tb_usuario`.`cd_usuario` AS `CD_USUARIO`, `tb_usuario`.`nm_usuario` AS `NM_USUARIO`, `tb_usuario`.`dt_nascimento` AS `DT_NASCIMENTO`, `tb_usuario`.`nm_email` AS `NM_EMAIL` FROM `tb_usuario` ;

-- --------------------------------------------------------

--
-- Structure for view `user_city`
--
DROP TABLE IF EXISTS `user_city`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_city`  AS SELECT `home`.`cd_logradouro` AS `CD_LOGRADOURO`, `home`.`cd_cep` AS `CD_CEP`, `home`.`cd_bairro` AS `CD_BAIRRO`, `home`.`cd_casa` AS `CD_CASA`, `home`.`nm_logradouro` AS `NM_LOGRADOURO`, `us`.`nm_usuario` AS `NM_USUARIO` FROM (`tb_logradouro` `home` join `tb_usuario` `us` on(`us`.`cd_logradouro` = `home`.`cd_logradouro`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_public`
--
DROP TABLE IF EXISTS `user_public`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_public`  AS SELECT `anu`.`cd_usuario` AS `CD_USUARIO`, `anu`.`cd_logradouro` AS `CD_LOGRADOURO`, `anu`.`cd_anuncio` AS `CD_ANUNCIO` FROM (`tb_anuncio` `anu` join `tb_usuario` `us` on(`anu`.`cd_usuario` = `us`.`cd_usuario` and `anu`.`cd_logradouro` = `us`.`cd_logradouro`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_uf`
--
DROP TABLE IF EXISTS `user_uf`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_uf`  AS SELECT `us`.`nm_usuario` AS `NM_USUARIO`, `uf`.`sg_uf` AS `SG_UF` FROM ((((`tb_usuario` `us` join `tb_logradouro` `lo` on(`lo`.`cd_logradouro` = `us`.`cd_logradouro`)) join `tb_bairro` `ba` on(`ba`.`cd_bairro` = `lo`.`cd_bairro`)) join `tb_cidade` `city` on(`city`.`cd_cidade` = `ba`.`cd_cidade`)) join `tb_uf` `uf` on(`uf`.`cd_uf` = `city`.`cd_uf`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livro_genero`
--
ALTER TABLE `livro_genero`
  ADD KEY `fk_genero_livro` (`cd_livro`),
  ADD KEY `fk_livro_genero` (`cd_genero`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tb_autor`
--
ALTER TABLE `tb_autor`
  ADD PRIMARY KEY (`cd_autor`);

--
-- Indexes for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD PRIMARY KEY (`cd_cidade`),
  ADD KEY `fk_cidade_uf` (`cd_uf`);

--
-- Indexes for table `tb_conversa`
--
ALTER TABLE `tb_conversa`
  ADD PRIMARY KEY (`cd_conversa`),
  ADD KEY `fk_conversa_usuario` (`cd_usuario`);

--
-- Indexes for table `tb_editora`
--
ALTER TABLE `tb_editora`
  ADD PRIMARY KEY (`cd_editora`);

--
-- Indexes for table `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`cd_genero`);

--
-- Indexes for table `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD PRIMARY KEY (`cd_livro`),
  ADD KEY `fk_livro_editora` (`cd_editora`),
  ADD KEY `fk_livro_autor` (`cd_autor`),
  ADD KEY `fk_usuario_cod` (`cd_usuario`);

--
-- Indexes for table `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD PRIMARY KEY (`cd_mensagem`),
  ADD KEY `fk_mensagem_conversa` (`cd_conversa`);

--
-- Indexes for table `tb_uf`
--
ALTER TABLE `tb_uf`
  ADD PRIMARY KEY (`cd_uf`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_usuario`),
  ADD UNIQUE KEY `uk_email` (`nm_email`),
  ADD KEY `FK_USER_CITY` (`cd_cidade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_autor`
--
ALTER TABLE `tb_autor`
  MODIFY `cd_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  MODIFY `cd_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5446;

--
-- AUTO_INCREMENT for table `tb_conversa`
--
ALTER TABLE `tb_conversa`
  MODIFY `cd_conversa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_editora`
--
ALTER TABLE `tb_editora`
  MODIFY `cd_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_genero`
--
ALTER TABLE `tb_genero`
  MODIFY `cd_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_livro`
--
ALTER TABLE `tb_livro`
  MODIFY `cd_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  MODIFY `cd_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_uf`
--
ALTER TABLE `tb_uf`
  MODIFY `cd_uf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `livro_genero`
--
ALTER TABLE `livro_genero`
  ADD CONSTRAINT `fk_genero_livro` FOREIGN KEY (`cd_livro`) REFERENCES `tb_livro` (`cd_livro`),
  ADD CONSTRAINT `fk_livro_genero` FOREIGN KEY (`cd_genero`) REFERENCES `tb_genero` (`cd_genero`);

--
-- Constraints for table `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD CONSTRAINT `fk_cidade_uf` FOREIGN KEY (`cd_uf`) REFERENCES `tb_uf` (`cd_uf`);

--
-- Constraints for table `tb_conversa`
--
ALTER TABLE `tb_conversa`
  ADD CONSTRAINT `fk_conversa_usuario` FOREIGN KEY (`cd_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Constraints for table `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD CONSTRAINT `fk_livro_autor` FOREIGN KEY (`cd_autor`) REFERENCES `tb_autor` (`cd_autor`),
  ADD CONSTRAINT `fk_livro_editora` FOREIGN KEY (`cd_editora`) REFERENCES `tb_editora` (`cd_editora`),
  ADD CONSTRAINT `fk_usuario_cod` FOREIGN KEY (`cd_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Constraints for table `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD CONSTRAINT `fk_mensagem_conversa` FOREIGN KEY (`cd_conversa`) REFERENCES `tb_conversa` (`cd_conversa`);

--
-- Constraints for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `FK_USER_CITY` FOREIGN KEY (`cd_cidade`) REFERENCES `tb_cidade` (`cd_cidade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
