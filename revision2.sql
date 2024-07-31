create table clients(
    id int(3) auto_increment primary key,
    photo varchar(255) not null,
    nom varchar(255) not null,
    sexe varchar(255) not null,
    ville int(3) not null,
    loisirs varchar(255) not null,
    foreign key(ville) REFERENCES ville(idville)
);

create table ville(
    idville int(3) auto_increment primary key,
    nomville varchar(255) not null
)
