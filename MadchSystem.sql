create database MadchSystem;

use MadchSystem;

create table Proyectos(
idProyecto int AUTO_INCREMENT,
nombreProyecto varchar(250),
descripcion varchar(250),
status int,
CONSTRAINT pk1 PRIMARY KEY (idProyecto)
);


create table Usuarios(
idusuario int,
nombre varchar(250),
apellidos varchar(250),
email varchar(250),
contra varchar(250),
telefono int(10),
tipo varchar(250),
status int,
idProyecto int,
CONSTRAINT pk2 PRIMARY KEY (idusuario),
CONSTRAINT fk1 FOREIGN KEY (idProyecto) REFERENCES Proyectos(idProyecto)
);

create table Servicios(
idServ int AUTO_INCREMENT,
nombreServ varchar(250),
status int,
CONSTRAINT pk3 PRIMARY KEY (idServ)
);
