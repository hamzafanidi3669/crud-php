create table ville(
    idville int(3) auto_increment primary key,
    ville varchar(40) not null
)

create table client(
    id int(3) auto_increment primary key,
    photo varchar(250) not null,
    nom varchar(30) Not null,
    sexe varchar(30) not null,
    loisirs varchar(30) not null,
    ville int(3) not null,
    constraint fk1 foreign key (ville) REFERENCES ville(idville)
)
insert into ville values
(null,'Casablanca'),
(null,'Rabat'),
(null,'Fes')