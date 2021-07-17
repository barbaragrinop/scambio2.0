--CADASTRAR USUARIO

delimiter $$
create procedure sp_cadastraUsuario(
in nome varchar(150), in senha varchar(100), in celular varchar(20), in datanasc date, in email varchar(100),in cep int,in rua varchar(100),in bairro varchar(50),in cidade varchar(50),in uf char(2), numerocasa int)
begin 
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
 end $$      
            

            