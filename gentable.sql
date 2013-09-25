-- Script SQL de génération des tables

create table if not exists Iut(
    id_iut int not null auto_increment,
    nom_iut varchar(25),
    adresse varchar(50),
    primary key (id_iut)
);

create table if not exists Manifestation(
    id_manif int not null auto_increment,
    nom_manif varchar(25),
    date_manif date,
    id_iut int,
    primary key (id_manif),
    constraint fk_manif_iut foreign key(id_iut) references Iut(id_iut)
);

create table if not exists Etudiant(
    id_etu int not null auto_increment,
    nom_edu varchar(25),
    date_naissance_edu date,
    sexe_edu boolean,
    id_iut int,
    primary key (id_etu),
    constraint fk_etu_iut foreign key(id_iut) references Iut(id_iut)
);

create table if not exists Epreuve(
    id_epreuve int not null auto_increment,
    nom_epreuve varchar(25),
    primary key (id_epreuve)
);

create table if not exists Participe(
    id_manif int,
    id_epreuve int,
    id_etu int,
    resultat int,
    primary key( id_manif, id_epreuve, id_etu),
    constraint fk_participe_manif foreign key(id_manif) references Manifestation(id_manif),
    constraint fk_participe_epreuve foreign key(id_epreuve) references Epreuve(id_epreuve),
    constraint fk_participe_etu foreign key(id_etu) references Etudiant(id_etu)
);

create table if not exists Contenu(
    id_manif int,
    id_epreuve int,
    primary key(id_manif, id_epreuve),
    constraint fk_contenu_manif foreign key(id_manif) references Manifestation(id_manif),
    constraint fk_contenu_epreuve foreign key(id_epreuve) references Epreuve(id_epreuve)
);