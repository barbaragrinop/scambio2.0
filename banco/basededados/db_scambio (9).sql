-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2021 às 23:06
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_scambio`
--
CREATE DATABASE IF NOT EXISTS `db_scambio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_scambio`;

DELIMITER $$
--
-- Procedimentos
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cadastraPublicacao` (IN `nome` VARCHAR(50), IN `descricaso` VARCHAR(200), IN `genero` VARCHAR(50), IN `autor` VARCHAR(60), IN `fotoo1` VARCHAR(70000), IN `fotoo2` VARCHAR(700000), IN `fotoo3` VARCHAR(700000), IN `usercd` INT(11), IN `dat` DATETIME)  begin 
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
        dat
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insereMatchSegundaChamada` (IN `usuario1` INT, IN `usuario2` INT, IN `confUsu1` BOOL, IN `confUsu2` BOOL, IN `idPub` INT)  begin
	if(usuario1 <> null) then
    	update tb_match set idConfUsu1 = confUsu1 where cd_livro = idPub and cd_usuario1 = usuario1;
   	else if (usuario2 <> null) then
    	update tb_match set idConfUsu2 = confUsu2 where cd_livro = idPub and cd_usuario2 = usuario2;   
    end if;
    end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inserePrimeiraChamadaProd` (IN `usuario1` INT, IN `usuario2` INT, IN `idPub` INT)  begin 
	if not exists(select * from tb_match where cd_livro = idPub and cd_usuario1 = usuario1 and cd_usuario2 = usuario2) then 
		insert into tb_match(cd_usuario1, cd_usuario2, cd_livro, idConfUsu1, idConfUsu2) values (usuario1, usuario2, idPub, 0, 0);
	end if;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ordenaChat` (IN `id` INT)  begin
	select * from (select @funcao:=id f) s, ordenacaoChat 
    where cd_usuario != f
    group by cd_usuario
    order by msg_id desc;
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

--
-- Funções
--
CREATE DEFINER=`root`@`localhost` FUNCTION `funcao` () RETURNS INT(11) NO SQL
    DETERMINISTIC
return @funcao$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `autor`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `autor` (
`NM_AUTOR` varchar(140)
,`NM_LIVRO` varchar(100)
,`NM_EDITORA` varchar(140)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `bairro_user`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `bairro_user` (
`NM_USUARIO` varchar(150)
,`NM_BAIRRO` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `chat_user`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `chat_user` (
`NM_USUARIO` varchar(150)
,`CD_MENSAGEM` int(11)
,`CD_CONVERSA` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `cit_bairro_rua`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `cit_bairro_rua` (
`NM_CIDADE` varchar(50)
,`NM_BAIRRO` varchar(50)
,`NM_LOGRADOURO` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `editora_livro`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `editora_livro` (
`NM_LIVRO` varchar(100)
,`NM_EDITORA` varchar(140)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_genero`
--

CREATE TABLE `livro_genero` (
  `cd_livro` int(11) DEFAULT NULL,
  `cd_genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro_genero`
--

INSERT INTO `livro_genero` (`cd_livro`, `cd_genero`) VALUES
(6, 1),
(30, 1),
(32, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `datemessage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `datemessage`) VALUES
(62, 55, 1, 'Oi munir', '2021-11-30 19:03:07'),
(63, 55, 1, 'Seu livro ainda está disponivel ?', '2021-11-30 19:03:18');

--
-- Acionadores `messages`
--
DELIMITER $$
CREATE TRIGGER `trNotificaUsuarioMsg` AFTER INSERT ON `messages` FOR EACH ROW begin
        declare de, para, ultima int;

			set de = (select outgoing_msg_id
                     from messages inner join tb_usuario on 
                     messages.incoming_msg_id = tb_usuario.cd_usuario 
                     order by msg_id desc limit 1);
                     
          set para = (select incoming_msg_id
                     from messages inner join tb_usuario on 
                     messages.incoming_msg_id = tb_usuario.cd_usuario 
                     order by msg_id desc limit 1);
             
            insert into notificacao set
                ds_notificacao = 'Uma nova mensagem', 
                dt_notificacao = now(), 
                nm_lugar = 'Mensagens',
                cd_usuario = 47,
                de = de, 
                para = para;
        end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `cd_notificacao` int(11) NOT NULL,
  `ds_notificacao` varchar(300) DEFAULT NULL,
  `dt_notificacao` datetime DEFAULT NULL,
  `nm_lugar` varchar(50) DEFAULT NULL,
  `de` int(11) DEFAULT NULL,
  `para` int(11) DEFAULT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `cd_livro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`cd_notificacao`, `ds_notificacao`, `dt_notificacao`, `nm_lugar`, `de`, `para`, `cd_usuario`, `cd_livro`) VALUES
(15, 'Sera um novo match?', '2021-11-30 17:21:26', 'Match', 1, 40, 47, 132),
(16, 'Sera um novo match?', '2021-11-30 17:22:34', 'Match', 40, 1, 47, 132),
(17, 'Sera um novo match?', '2021-11-30 17:51:41', 'Match', 40, 1, 47, 127),
(18, 'Sera um novo match?', '2021-11-30 17:51:53', 'Match', 1, 40, 47, 127),
(19, 'Sera um novo match?', '2021-11-30 19:03:03', 'Match', 1, 55, 47, 136),
(20, 'Uma nova mensagem', '2021-11-30 19:03:07', 'Mensagens', 1, 55, 47, NULL),
(21, 'Uma nova mensagem', '2021-11-30 19:03:18', 'Mensagens', 1, 55, 47, NULL);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `ordenacaochat`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `ordenacaochat` (
`cd_usuario` int(11)
,`msg_id` int(11)
,`nm_usuario` varchar(150)
,`msg` varchar(2000)
,`datemessage` datetime
,`nm_status` varchar(10)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reclamacao`
--

CREATE TABLE `reclamacao` (
  `cd_reclamacao` int(11) NOT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `ds_reclamacao` varchar(300) DEFAULT NULL,
  `dt_reclamacao` datetime DEFAULT NULL,
  `nm_email_rec` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Acionadores `reclamacao`
--
DELIMITER $$
CREATE TRIGGER `trNotificaUsuario` AFTER INSERT ON `reclamacao` FOR EACH ROW begin
        declare x int;
			set x = (select cd_usuario from reclamacao order by cd_reclamacao desc limit 1);
            insert into notificacao set
                ds_notificacao = 'Uma reclamacao foi aberta', 
                dt_notificacao = now(), 
                cd_usuario = x,
                nm_lugar = 'Reclamações';
        end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacoesmatches`
--

CREATE TABLE `relacoesmatches` (
  `id` int(11) NOT NULL,
  `usuario1` int(11) NOT NULL,
  `usuario2` int(11) NOT NULL,
  `cd_pub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relacoesmatches`
--

INSERT INTO `relacoesmatches` (`id`, `usuario1`, `usuario2`, `cd_pub`) VALUES
(1, 1, 40, 132),
(2, 40, 1, 127);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_anuncio`
--

CREATE TABLE `tb_anuncio` (
  `cd_anuncio` int(11) NOT NULL,
  `ds_anuncio` varchar(1000) DEFAULT NULL,
  `dt_anuncio` datetime DEFAULT NULL,
  `ds_img1` longtext DEFAULT NULL,
  `ds_img2` varchar(100) DEFAULT NULL,
  `cd_logradouro` int(11) DEFAULT NULL,
  `cd_livro` int(11) DEFAULT NULL,
  `cd_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_anuncio`
--

INSERT INTO `tb_anuncio` (`cd_anuncio`, `ds_anuncio`, `dt_anuncio`, `ds_img1`, `ds_img2`, `cd_logradouro`, `cd_livro`, `cd_usuario`) VALUES
(1, 'Estou querendo trocar esse livro para achar um livro do meu interesse.', '2021-09-17 04:50:00', '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', '1', 1, 6, 1),
(4, 'HACKING HEHE', '2021-09-17 04:50:00', '1', '1', 1, 30, 1),
(6, 'JOEL JOTA HEHE', '2021-09-17 04:50:00', '1', '1', 1, 32, 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_autor`
--

CREATE TABLE `tb_autor` (
  `cd_autor` int(11) NOT NULL,
  `nm_autor` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_autor`
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
(1, 'Jockey Club', 5430),
(2, 'Parque São Vicente', 5426),
(3, 'Alto da Balança', 5427),
(14, 'ap', 5438),
(15, NULL, NULL),
(16, NULL, NULL),
(17, NULL, NULL),
(18, NULL, NULL),
(19, NULL, NULL),
(20, '', NULL),
(21, 'ap', 5445),
(22, 'Parque São Vicente', 5426),
(23, 'Vila Jockei Clube', 5426),
(24, 'Centro', 5430),
(25, 'Vila Cascatinha', 5426),
(26, 'Vila São Jorge', 5426),
(27, NULL, 5426),
(28, NULL, 5446),
(29, NULL, 5447),
(30, NULL, 5448),
(31, '1', 5426);

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
(5427, 'Fortaleza', 6, NULL),
(5430, 'Santos', 25, NULL),
(5431, NULL, NULL, NULL),
(5432, NULL, NULL, NULL),
(5433, NULL, NULL, NULL),
(5434, NULL, NULL, NULL),
(5435, NULL, NULL, NULL),
(5436, NULL, NULL, NULL),
(5437, NULL, NULL, NULL),
(5438, 'dasdasdas', 25, NULL),
(5439, NULL, NULL, NULL),
(5440, NULL, NULL, NULL),
(5441, NULL, NULL, NULL),
(5442, NULL, NULL, NULL),
(5443, NULL, NULL, NULL),
(5444, '', NULL, NULL),
(5445, '', 25, NULL),
(5446, 'Porto Alegre', 22, NULL),
(5447, 'Crato', 6, NULL),
(5448, 'Nova Friburgo', 18, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentario`
--

CREATE TABLE `tb_comentario` (
  `cd_comentario` int(11) NOT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `dt_comentario` datetime DEFAULT NULL,
  `ds_comentario` varchar(1000) DEFAULT NULL,
  `cd_publicacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Extraindo dados da tabela `tb_editora`
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
-- Estrutura da tabela `tb_genero`
--

CREATE TABLE `tb_genero` (
  `cd_genero` int(11) NOT NULL,
  `nm_genero` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_genero`
--

INSERT INTO `tb_genero` (`cd_genero`, `nm_genero`) VALUES
(1, 'Romance');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livro`
--

CREATE TABLE `tb_livro` (
  `cd_livro` int(11) NOT NULL,
  `nm_livro` varchar(100) DEFAULT NULL,
  `cd_editora` int(11) DEFAULT NULL,
  `cd_autor` int(11) DEFAULT NULL,
  `nm_autor` varchar(60) NOT NULL,
  `nm_genero` varchar(60) NOT NULL,
  `foto1` longtext NOT NULL,
  `foto2` longtext NOT NULL,
  `foto3` longtext NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `dt_publicacao` datetime DEFAULT NULL,
  `status_pub` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_livro`
--

INSERT INTO `tb_livro` (`cd_livro`, `nm_livro`, `cd_editora`, `cd_autor`, `nm_autor`, `nm_genero`, `foto1`, `foto2`, `foto3`, `descricao`, `cd_usuario`, `dt_publicacao`, `status_pub`) VALUES
(113, 'O livro dos ressignificados', NULL, NULL, 'João Doederlin', 'Resenha', 'd585403f8f04705412a2c397f20c6f9c1.jpg', 'd585403f8f04705412a2c397f20c6f9c2.jpg', 'd585403f8f04705412a2c397f20c6f9c3', ' 215 páginas. Livro em ótimo estado Foi lido uma única vez.', 1, '2021-11-25 05:52:00', NULL),
(114, 'Fundamentos da Biologia Moderna', NULL, NULL, 'Amabis e Martho', 'CienciaBiologica', '731a4184921bdecd42a420db2d5434941.jpg', '731a4184921bdecd42a420db2d5434942.jpg', '731a4184921bdecd42a420db2d5434943.jpg', 'Livro usado, com algumas páginas grifadas, algumas anotações e post its, porém em bom estado de conservação.', 1, '2021-11-25 05:56:00', NULL),
(115, 'Pretinha, eu?', NULL, NULL, 'Julio Emilio', 'Poesia', 'c80c54acd61f1eeb83a0db56f16393571.jpg', 'c80c54acd61f1eeb83a0db56f16393572', 'c80c54acd61f1eeb83a0db56f16393573', 'Usado em perfeito estado e sem riscos', 1, '2021-11-25 05:58:00', NULL),
(116, 'Biologia das células', NULL, NULL, 'EM', 'CienciaBiologica', 'dc5d2c9ab8b50448c395c058888df3ef1.jpg', 'dc5d2c9ab8b50448c395c058888df3ef2.jpg', 'dc5d2c9ab8b50448c395c058888df3ef3.jpg', 'Biologia das Células Vol. 1, usado, com algumas páginas grifadas porém em bom estado de conservação.', 1, '2021-11-25 06:04:00', NULL),
(117, 'Bem lembrado', NULL, NULL, 'Soul Walder', 'Crônica', '0df300d6dbb90c6b0e63e6f4ec85258b1.jpg', '0df300d6dbb90c6b0e63e6f4ec85258b2.jpg', '0df300d6dbb90c6b0e63e6f4ec85258b3', 'Perfeito para revisões para ENEM e vestibulares específicos, além de estudos para ensino médio e concurso de nível médio!', 1, '2021-11-25 06:10:00', NULL),
(118, 'Lucíola', NULL, NULL, 'José de Alencar', 'Memórias', '319f1339f50a2de53a4fb0b9d46339b11.jpg', '319f1339f50a2de53a4fb0b9d46339b12.jpg', '319f1339f50a2de53a4fb0b9d46339b13', '170 páginas', 1, '2021-11-25 06:11:00', NULL),
(119, 'O livro de ouro da mitologia', NULL, NULL, 'Thomas Bulfinch', 'Crônica', 'cbd4efa9f9026d79fb2a044d5a294e071.jpg', 'cbd4efa9f9026d79fb2a044d5a294e072.jpg', 'cbd4efa9f9026d79fb2a044d5a294e073.jpg', 'Interessante, curiosas histórias mitológicas, sem rasuras, anotações excelente estado de conservação.', 1, '2021-11-25 06:13:00', NULL),
(120, 'Um de nós está mentindo', NULL, NULL, 'Karen M', 'Terror', '3602e95723813f771a69127e3b41cae81.jpg', '3602e95723813f771a69127e3b41cae82.jpg', '3602e95723813f771a69127e3b41cae83.jpg', 'Mais informações via chat', 1, '2021-11-25 06:14:00', NULL),
(121, 'Um de nós é o próximo', NULL, NULL, 'Karen M', 'Literatura Infanto-juvenil', '099d7ba48d7d0e71c63b5ce5baa9e02e1.jpg', '099d7ba48d7d0e71c63b5ce5baa9e02e2.jpg', '099d7ba48d7d0e71c63b5ce5baa9e02e3', 'livro infanto juvenil, novo, em perfeito estado, sem nenhuma marca de uso.', 1, '2021-11-25 06:16:00', NULL),
(122, 'A maça envenenada', NULL, NULL, 'Karen M', 'Ficção', '9128b6a9ee0676c87de9479b134427a61.jpg', '9128b6a9ee0676c87de9479b134427a62.jpg', '9128b6a9ee0676c87de9479b134427a63', 'Mais informações via chat', 1, '2021-11-25 06:17:00', NULL),
(123, 'P.S. Eu te amo', NULL, NULL, 'Cecelia Ahern', 'Romance', '1eec06add20ae3c4942b2a14c65952861.jpg', '1eec06add20ae3c4942b2a14c65952862', '1eec06add20ae3c4942b2a14c65952863', 'livro P.S Eu Te Amo em português em bom estado!! livro sem páginas e/ou escritas.', 1, '2021-11-25 06:17:00', NULL),
(124, 'Harry potter', NULL, NULL, 'J.K. Rowling', 'Literatura Infantil', '2f700f808a1a299c690fb7b0659426ca1.jpg', '2f700f808a1a299c690fb7b0659426ca2', '2f700f808a1a299c690fb7b0659426ca3', 'Semis novov, usado apenas 1 vez', 1, '2021-11-25 06:18:00', NULL),
(125, 'Romeu e Julieta', NULL, NULL, 'William Shakespace', 'Literatura Infantil', '0bd6de15aeef2fde47821a45475c6f751.jpg', '0bd6de15aeef2fde47821a45475c6f752', '0bd6de15aeef2fde47821a45475c6f753', 'Peças teatrais Leitura obrigatória', 1, '2021-11-25 06:20:00', NULL),
(126, 'O livro da psicologia', NULL, NULL, 'William Shakespace', 'Resenha', '9a656b2c5b8e6d11d97c5628b3bb4af51.jpg', '9a656b2c5b8e6d11d97c5628b3bb4af52.jpg', '9a656b2c5b8e6d11d97c5628b3bb4af53', 'O livro da psicologia', 1, '2021-11-25 06:21:00', NULL),
(127, 'A escrava Isaura', NULL, NULL, 'Gustavo Guimarães', 'Resenha', '112cd01a4c739cdccbec33d3a55062531.jpg', '112cd01a4c739cdccbec33d3a55062532', '112cd01a4c739cdccbec33d3a55062533', 'Livro novo, recem comprado', 1, '2021-11-25 06:28:00', NULL),
(132, 'O pequeno principe', NULL, NULL, 'Joseph parker', 'Lad-Lit', '0282fcd95596c7c36a6877fa75dcd8e61.jpg', '', '', 'Livro novo, comprei há pouco tempo mas não gostei', 40, '2021-11-27 07:22:00', NULL),
(135, 'Harry Potter e a Pedra Filosofal', NULL, NULL, 'J. K. Rowling', 'Ficção', '2115dd217d633d46069f63c4fe9b0a311.jpg', '2115dd217d633d46069f63c4fe9b0a312.jpg', '2115dd217d633d46069f63c4fe9b0a313.jpg', 'Descrição: Há 20 anos atrás a magia surgiu no Brasil com a chegada de Harry Potter e a Pedra Filosofal', 55, '2021-11-30 06:50:00', NULL),
(136, 'O Universo de Harry Potter de A a Z', NULL, NULL, 'J.K Rowling', 'Literatura Fantástica', '5d50a553d558c4079383474e9c4cc7f71.jpg', '5d50a553d558c4079383474e9c4cc7f72.jpg', '', 'Uma geração de crianças entorndo do mundo inteiro embarcou no Expresso de Hogwarts', 55, '2021-11-30 06:55:00', NULL);

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
(2, 'RUA TECE DE BAGBY', '11360220', 2, 55),
(3, 'Rua Djalma Petit', '60851120', 3, 121),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, 'dasads', '11355', 14, 958948),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, '11360220', NULL, NULL),
(20, '', '11360220', NULL, 0),
(21, '', '11360220', 21, 958948),
(22, 'Rua Tece de Bagby', '11360220', 22, 55),
(23, 'Rua Gabriel Passos', '11360340', 23, 23),
(24, 'Praça Visconde de Mauá', '11010', 24, 55),
(25, 'Rua Major Eugênio Terral', '11370', 25, 3),
(26, 'Rua Rubim César', '11380', 26, 150),
(27, NULL, '11380', NULL, NULL),
(28, NULL, '91790', NULL, NULL),
(29, NULL, '63101', NULL, NULL),
(30, NULL, '28634', NULL, NULL),
(31, '1', '11380070', 31, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_match`
--

CREATE TABLE `tb_match` (
  `id` int(11) NOT NULL,
  `idConfUsu1` tinyint(1) DEFAULT NULL,
  `idConfUsu2` tinyint(1) DEFAULT NULL,
  `cd_usuario1` int(11) DEFAULT NULL,
  `cd_usuario2` int(11) DEFAULT NULL,
  `cd_livro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_match`
--

INSERT INTO `tb_match` (`id`, `idConfUsu1`, `idConfUsu2`, `cd_usuario1`, `cd_usuario2`, `cd_livro`) VALUES
(26, 0, 1, 1, 40, 132),
(27, 0, 1, 40, 1, 132),
(28, 0, 0, 40, 1, 127),
(29, 0, 0, 1, 40, 127),
(30, 0, 0, 1, 55, 136);

--
-- Acionadores `tb_match`
--
DELIMITER $$
CREATE TRIGGER `tr_notificaSolicMatch` AFTER INSERT ON `tb_match` FOR EACH ROW begin 
			declare de, para, ultima, livro int;
			set ultima = (select id from tb_match order by id desc limit 1);
			set de = (select cd_usuario1 from tb_match where id = ultima order by id desc limit 1);
			set para = (select cd_usuario2 from tb_match where id = ultima  order by id desc limit 1);
            set livro = (select cd_livro from tb_match where id = ultima  order by id desc limit 1);
            
             insert into notificacao set
                ds_notificacao = 'Sera um novo match?', 
                dt_notificacao = now(), 
                nm_lugar = 'Match',
                cd_usuario = 47,
                de = de, 
                para = para,
                cd_livro = livro;
		end
$$
DELIMITER ;

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
-- Estrutura da tabela `tb_publicacao`
--

CREATE TABLE `tb_publicacao` (
  `cd_publicacao` int(11) NOT NULL,
  `cd_usuario` int(11) DEFAULT NULL,
  `dt_publicacao` datetime DEFAULT NULL,
  `ds_publicacao` varchar(1000) DEFAULT NULL,
  `nm_genero` varchar(50) DEFAULT NULL
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
  `cd_logradouro` int(11) DEFAULT NULL,
  `cd_recuperacao` varchar(6) NOT NULL,
  `exp` int(11) NOT NULL,
  `DS_IMGP` longtext DEFAULT NULL,
  `nm_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_usuario`, `nm_usuario`, `cd_celular`, `dt_nascimento`, `nm_email`, `nm_senha`, `nm_foto`, `cd_logradouro`, `cd_recuperacao`, `exp`, `DS_IMGP`, `nm_status`) VALUES
(1, 'Barbara Hellen', '1333333333', '2001-02-02', 'barbarapereira123@hotmail.com', '123', NULL, 2, 'B9E331', 0, '44f09c2de03dee9f8c7e8c6115c51053.jpg', '0'),
(26, 'Yago Felipe Marques Tavares', '', '2001-12-12', 'yago.tavares@etec.sp.gov.br', '1234', NULL, 22, '62B2DB', 0, NULL, '0'),
(40, 'Josefa Silva', '(74) 94894-8948', '0000-00-00', 'josefa@outlook.com', '123', NULL, 22, '', 0, NULL, '1'),
(41, 'Melissa', '13988775330', '0000-00-00', 'melissa.neves2@etec.sp.gov.br', 'MEL22052003', NULL, 23, '6AA144', 0, NULL, '0'),
(47, 'Scambio', '13988369863', '2001-09-09', 'scambio@dilibri.com', '12341234', 'Foto', 1, '[value', 0, '[value-10]', '0'),
(55, 'Munir Arabi', '', '1969-12-31', 'munir-arabi@hotmail.com', 'munir123', NULL, 31, '', 0, NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `user_`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `user_` (
`NM_USUARIO` varchar(150)
,`NM_EMAIL` varchar(100)
,`CD_CELULAR` varchar(20)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `user_all_info`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `user_all_info` (
`CD_USUARIO` int(11)
,`NM_USUARIO` varchar(150)
,`DT_NASCIMENTO` date
,`NM_EMAIL` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `user_city`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `user_city` (
`CD_LOGRADOURO` int(11)
,`CD_CEP` varchar(15)
,`CD_BAIRRO` int(11)
,`CD_CASA` int(11)
,`NM_LOGRADOURO` varchar(100)
,`NM_USUARIO` varchar(150)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `user_public`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `user_public` (
`CD_USUARIO` int(11)
,`CD_LOGRADOURO` int(11)
,`CD_ANUNCIO` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `user_uf`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `user_uf` (
`NM_USUARIO` varchar(150)
,`SG_UF` char(2)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `autor`
--
DROP TABLE IF EXISTS `autor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `autor`  AS SELECT `aut`.`nm_autor` AS `NM_AUTOR`, `li`.`nm_livro` AS `NM_LIVRO`, `edi`.`nm_editora` AS `NM_EDITORA` FROM ((`tb_autor` `aut` join `tb_livro` `li` on(`aut`.`cd_autor` = `li`.`cd_autor`)) join `tb_editora` `edi` on(`edi`.`cd_editora` = `li`.`cd_editora`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `bairro_user`
--
DROP TABLE IF EXISTS `bairro_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bairro_user`  AS SELECT `us`.`nm_usuario` AS `NM_USUARIO`, `ba`.`nm_bairro` AS `NM_BAIRRO` FROM ((`tb_usuario` `us` join `tb_logradouro` `lo` on(`us`.`cd_logradouro` = `lo`.`cd_logradouro`)) join `tb_bairro` `ba` on(`ba`.`cd_bairro` = `lo`.`cd_bairro`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `chat_user`
--
DROP TABLE IF EXISTS `chat_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `chat_user`  AS SELECT `us`.`nm_usuario` AS `NM_USUARIO`, `msg`.`cd_mensagem` AS `CD_MENSAGEM`, `co`.`cd_conversa` AS `CD_CONVERSA` FROM ((`tb_mensagem` `msg` join `tb_conversa` `co` on(`co`.`cd_conversa` = `msg`.`cd_conversa`)) join `tb_usuario` `us` on(`co`.`cd_usuario` = `us`.`cd_usuario`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `cit_bairro_rua`
--
DROP TABLE IF EXISTS `cit_bairro_rua`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cit_bairro_rua`  AS SELECT `city`.`nm_cidade` AS `NM_CIDADE`, `ba`.`nm_bairro` AS `NM_BAIRRO`, `lo`.`nm_logradouro` AS `NM_LOGRADOURO` FROM ((`tb_cidade` `city` join `tb_bairro` `ba` on(`city`.`cd_cidade` = `ba`.`cd_cidade`)) join `tb_logradouro` `lo` on(`lo`.`cd_bairro` = `ba`.`cd_bairro`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `editora_livro`
--
DROP TABLE IF EXISTS `editora_livro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `editora_livro`  AS SELECT `li`.`nm_livro` AS `NM_LIVRO`, `edi`.`nm_editora` AS `NM_EDITORA` FROM (`tb_livro` `li` join `tb_editora` `edi` on(`li`.`cd_editora` = `edi`.`cd_editora`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `ordenacaochat`
--
DROP TABLE IF EXISTS `ordenacaochat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ordenacaochat`  AS SELECT DISTINCT `u`.`cd_usuario` AS `cd_usuario`, `m`.`msg_id` AS `msg_id`, `u`.`nm_usuario` AS `nm_usuario`, `m`.`msg` AS `msg`, `m`.`datemessage` AS `datemessage`, `u`.`nm_status` AS `nm_status` FROM (`messages` `m` left join `tb_usuario` `u` on(`u`.`cd_usuario` = `m`.`outgoing_msg_id`)) WHERE `m`.`incoming_msg_id` = `funcao`() ;

-- --------------------------------------------------------

--
-- Estrutura para vista `user_`
--
DROP TABLE IF EXISTS `user_`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_`  AS SELECT `tb_usuario`.`nm_usuario` AS `NM_USUARIO`, `tb_usuario`.`nm_email` AS `NM_EMAIL`, `tb_usuario`.`cd_celular` AS `CD_CELULAR` FROM `tb_usuario` ;

-- --------------------------------------------------------

--
-- Estrutura para vista `user_all_info`
--
DROP TABLE IF EXISTS `user_all_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_all_info`  AS SELECT `tb_usuario`.`cd_usuario` AS `CD_USUARIO`, `tb_usuario`.`nm_usuario` AS `NM_USUARIO`, `tb_usuario`.`dt_nascimento` AS `DT_NASCIMENTO`, `tb_usuario`.`nm_email` AS `NM_EMAIL` FROM `tb_usuario` ;

-- --------------------------------------------------------

--
-- Estrutura para vista `user_city`
--
DROP TABLE IF EXISTS `user_city`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_city`  AS SELECT `home`.`cd_logradouro` AS `CD_LOGRADOURO`, `home`.`cd_cep` AS `CD_CEP`, `home`.`cd_bairro` AS `CD_BAIRRO`, `home`.`cd_casa` AS `CD_CASA`, `home`.`nm_logradouro` AS `NM_LOGRADOURO`, `us`.`nm_usuario` AS `NM_USUARIO` FROM (`tb_logradouro` `home` join `tb_usuario` `us` on(`us`.`cd_logradouro` = `home`.`cd_logradouro`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `user_public`
--
DROP TABLE IF EXISTS `user_public`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_public`  AS SELECT `anu`.`cd_usuario` AS `CD_USUARIO`, `anu`.`cd_logradouro` AS `CD_LOGRADOURO`, `anu`.`cd_anuncio` AS `CD_ANUNCIO` FROM (`tb_anuncio` `anu` join `tb_usuario` `us` on(`anu`.`cd_usuario` = `us`.`cd_usuario` and `anu`.`cd_logradouro` = `us`.`cd_logradouro`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `user_uf`
--
DROP TABLE IF EXISTS `user_uf`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_uf`  AS SELECT `us`.`nm_usuario` AS `NM_USUARIO`, `uf`.`sg_uf` AS `SG_UF` FROM ((((`tb_usuario` `us` join `tb_logradouro` `lo` on(`lo`.`cd_logradouro` = `us`.`cd_logradouro`)) join `tb_bairro` `ba` on(`ba`.`cd_bairro` = `lo`.`cd_bairro`)) join `tb_cidade` `city` on(`city`.`cd_cidade` = `ba`.`cd_cidade`)) join `tb_uf` `uf` on(`uf`.`cd_uf` = `city`.`cd_uf`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `livro_genero`
--
ALTER TABLE `livro_genero`
  ADD KEY `fk_genero_livro` (`cd_livro`),
  ADD KEY `fk_livro_genero` (`cd_genero`);

--
-- Índices para tabela `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Índices para tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`cd_notificacao`);

--
-- Índices para tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  ADD PRIMARY KEY (`cd_reclamacao`),
  ADD KEY `fk_reclamcao_usuario` (`cd_usuario`);

--
-- Índices para tabela `relacoesmatches`
--
ALTER TABLE `relacoesmatches`
  ADD PRIMARY KEY (`id`);

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
-- Índices para tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD PRIMARY KEY (`cd_comentario`),
  ADD KEY `fk_publicacao` (`cd_publicacao`);

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
-- Índices para tabela `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`cd_genero`);

--
-- Índices para tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD PRIMARY KEY (`cd_livro`),
  ADD KEY `fk_livro_editora` (`cd_editora`),
  ADD KEY `fk_livro_autor` (`cd_autor`),
  ADD KEY `fk_cd_usuario` (`cd_usuario`);

--
-- Índices para tabela `tb_logradouro`
--
ALTER TABLE `tb_logradouro`
  ADD PRIMARY KEY (`cd_logradouro`),
  ADD KEY `fk_logradouro_bairro` (`cd_bairro`);

--
-- Índices para tabela `tb_match`
--
ALTER TABLE `tb_match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_match_livro` (`cd_livro`);

--
-- Índices para tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD PRIMARY KEY (`cd_mensagem`),
  ADD KEY `fk_mensagem_conversa` (`cd_conversa`);

--
-- Índices para tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  ADD PRIMARY KEY (`cd_publicacao`),
  ADD KEY `fk_usuario` (`cd_usuario`);

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
-- AUTO_INCREMENT de tabela `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `cd_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  MODIFY `cd_reclamacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relacoesmatches`
--
ALTER TABLE `relacoesmatches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_anuncio`
--
ALTER TABLE `tb_anuncio`
  MODIFY `cd_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_autor`
--
ALTER TABLE `tb_autor`
  MODIFY `cd_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `tb_bairro`
--
ALTER TABLE `tb_bairro`
  MODIFY `cd_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `tb_cidade`
--
ALTER TABLE `tb_cidade`
  MODIFY `cd_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5449;

--
-- AUTO_INCREMENT de tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  MODIFY `cd_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_conversa`
--
ALTER TABLE `tb_conversa`
  MODIFY `cd_conversa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_editora`
--
ALTER TABLE `tb_editora`
  MODIFY `cd_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_genero`
--
ALTER TABLE `tb_genero`
  MODIFY `cd_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  MODIFY `cd_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de tabela `tb_logradouro`
--
ALTER TABLE `tb_logradouro`
  MODIFY `cd_logradouro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `tb_match`
--
ALTER TABLE `tb_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  MODIFY `cd_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  MODIFY `cd_publicacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_uf`
--
ALTER TABLE `tb_uf`
  MODIFY `cd_uf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  ADD CONSTRAINT `fk_reclamcao_usuario` FOREIGN KEY (`cd_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD CONSTRAINT `fk_publicacao` FOREIGN KEY (`cd_publicacao`) REFERENCES `tb_publicacao` (`cd_publicacao`);

--
-- Limitadores para a tabela `tb_match`
--
ALTER TABLE `tb_match`
  ADD CONSTRAINT `fk_match_livro` FOREIGN KEY (`cd_livro`) REFERENCES `tb_livro` (`cd_livro`);

--
-- Limitadores para a tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`cd_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
