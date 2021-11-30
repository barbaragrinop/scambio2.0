create table tb_match(
id int not null primary key auto_increment,
idConfUsu1 bool,
idConfUsu2 bool,
cd_usuario1 int, 
cd_usuario2 int,
cd_livro int,
	constraint fk_match_livro
		foreign key(cd_livro)
			references tb_livro(cd_livro)
);






delimiter $
create procedure sp_inserePrimeiraChamadaProd(
in usuario1 int, 
in usuario2 int, 
in idPub int
)
begin 
	if not exists(select * from tb_match where cd_livro = idPub and cd_usuario1 = usuario and cd_usuario2 = usuario2) then 
		insert into tb_match(cd_usuario1, cd_usuario2, cd_livro, idConfUsu1, idConfUsu2) values (usuario1, usuario2, idPub, 0, 0);
	end if;

end $



delimiter $
create procedure sp_insereMatchSegundaChamada(
in confUsu1 bool, 
in confUsu2 bool,
in idPub int
)
begin 
    update tb_match set idConfUsu1 = confUsu1, idConfUsu2 = confUsu2 where cd_livro = idPub;    
end $

