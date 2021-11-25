
create function funcao() returns INTEGER DETERMINISTIC NO SQL return @funcao;

drop view ordenacaoChat;

create view ordenacaoChat as 
select distinct cd_usuario, msg_id, nm_usuario,nm_status,  msg, datemessage 
	from messages as m left join tb_usuario u
		on cd_usuario = outgoing_msg_id
	where incoming_msg_id = funcao()
union 
select distinct cd_usuario, msg_id, nm_usuario, nm_status, msg, datemessage 
	from messages as m left join tb_usuario u
		on cd_usuario = incoming_msg_id
	 where outgoing_msg_id = funcao() 
     order by  datemessage desc;


select cd_usuario, msg_id, nm_usuario,  nm_status, msg, datemessage 
    from (select @funcao:=1 f) s, ordenacaoChat o
    group by cd_usuario order by msg_id desc ;
    
    select * from (select @funcao:=1 f) s, ordenacaoChat
    where cd_usuario != f
    group by cd_usuario
    order by msg_id desc;
    
call sp_ordenaChat(1)