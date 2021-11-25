create function funcao() returns INTEGER DETERMINISTIC NO SQL return @funcao;


create view ordenacaoChat as 
select distinct cd_usuario, msg_id, nm_usuario, msg, datemessage 
	from messages as m left join tb_usuario u
		on cd_usuario = outgoing_msg_id
	where incoming_msg_id = funcao()
union 
select distinct cd_usuario, msg_id, nm_usuario, msg, datemessage 
	from messages as m left join tb_usuario u
    on cd_usuario = incoming_msg_id
    where outgoing_msg_id = funcao() 
    order by  datemessage desc;
