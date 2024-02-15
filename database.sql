create database if not exists sistemacrud default character set = utf8mb4 default collate = utf8mb4_unicode_ci;
use sistemacrud;

create table if not exists usuarios
(
idusuario smallint unsigned not null auto_increment,
login varchar(255) not null,
senha varchar(32) not null,
nome varchar(255) not null,
created_at timestamp not null default current_timestamp(),
updated_at timestamp not null default current_timestamp(),
constraint pk_usuarios primary key(idusuario),
constraint uq_usuarios unique(login)
) default character set = utf8mb4 default collate = utf8mb4_unicode_ci engine InnoDB;

create table if not exists clientes
(
idcliente smallint unsigned not null auto_increment,
nome varchar(255) not null,
sobrenome varchar(32) not null,
email varchar(255) not null,
nascimento date,
idusuario smallint unsigned not null,
created_at timestamp not null default current_timestamp(),
updated_at timestamp not null default current_timestamp(),
constraint pk_clientes primary key(idcliente),
constraint fk_clientes_usuarios foreign key(idusuario) references usuarios(idusuario),
constraint uq_clientes unique(email)
) default character set = utf8mb4 default collate = utf8mb4_unicode_ci engine InnoDB;

select * from sistemacrud.usuarios;
select * from sistemacrud.clientes;