create database urna;
use urna;

create table opcao_voto
(
	id int(5) auto_increment primary key,
    opcao varchar(50) not null,
    total_votos int(5)
);
insert into opcao_voto (id, opcao, total_votos) values ('1','Horácio da Silva', '0');

drop table opcao_voto;
	

select * from opcao_voto;
