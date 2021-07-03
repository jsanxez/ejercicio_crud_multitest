create database multitestdb;
user multitestdb;

create TABLE employee (
    dni char(8) not null,
    name varchar(45) not null,
    lastname varchar(45) not null,
    
    primary KEY (dni)
    
)
    engine=INNODB;

insert into employee values ("12346578", "jose", "sanchez");
insert into employee values ("87654321", "ana", "gomez");
insert into employee values ("32145698", "juan", "perez");
insert into employee values ("78945612", "tom", "vargas");
insert into employee values ("12345678", "jorge", "torrin");
