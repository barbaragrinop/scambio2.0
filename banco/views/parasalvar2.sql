delimiter $

create procedure sp_ordenaChat(in id int)
begin
	select * from (select @funcao:=id f) s, ordenacaoChat
    where cd_usuario != f
    group by cd_usuario
    order by msg_id desc;
end $



