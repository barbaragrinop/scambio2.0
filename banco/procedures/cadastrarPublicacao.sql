
delimiter $$
create procedure sp_cadastraPublicacao(
in nome varchar(50),
in descricaso varchar(200), 
in genero varchar (50), 
in autor varchar(60), 
in fotoo1 varchar(70000), 
in fotoo2 varchar(700000), 
in fotoo3 varchar(700000)) 
begin 
	insert into tb_livro (
		nm_livro, 
        nm_autor,
        nm_genero, 
        descricao, 
        foto1, 
        foto2, 
        foto3
    ) values (
		nome, 
        autor,
        genero, 
        descricaso, 
        fotoo1, 
        fotoo2, 
        fotoo3
    );
        
 end $$      