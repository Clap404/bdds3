drop table Contenu;
drop table Participe;
drop table Epreuve;
drop table Etudiant;
drop table Manifestation;
drop table Iut;

create table Iut(
    id_iut int not null auto_increment,
    nom_iut varchar(25),
    adresse varchar(50),
    nb_etu int,
    primary key (id_iut)
);

INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Mount Pearl","P.O. Box 814, 6349 Nec, Road",208);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Bayreuth","Ap #197-4730 Metus. St.",201);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Plauen","P.O. Box 311, 9468 Non Rd.",137);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Episcopia","5028 Tincidunt Av.",144);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Evansville","Ap #972-6930 Risus, Road",114);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Clydebank","Ap #927-3696 Aenean Ave",266);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Iqaluit","P.O. Box 102, 8690 Scelerisque, Street",256);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Motueka","P.O. Box 706, 8040 Erat. Ave",115);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Montreal","Ap #197-6802 Morbi Street",158);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("West Valley City","P.O. Box 865, 795 Tristique Road",267);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Rocca d'Arce","914-9537 Varius Rd.",220);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Bierges","9244 Mi Road",119);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Fino Mornasco","307-2067 Est Avenue",215);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Sulzbach","P.O. Box 446, 6247 Pede, Street",194);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Stevenage","318-9753 Lorem Rd.",112);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Fort Wayne","809-8384 Risus St.",229);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Alsemberg","3649 Nulla Ave",229);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Leamington","4117 Ligula Av.",129);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("Heilbronn","Ap #985-1131 Dapibus Rd.",130);
INSERT INTO Iut (nom_iut,adresse,nb_etu) VALUES ("IJlst","Ap #613-770 Amet, Road",176);

create table Epreuve(
    id_epreuve int not null auto_increment,
    nom_epreuve varchar(25),
    primary key (id_epreuve)
);

INSERT INTO Epreuve (nom_epreuve) VALUES ("Saut en longueur");
INSERT INTO Epreuve (nom_epreuve) VALUES ("VTT");
INSERT INTO Epreuve (nom_epreuve) VALUES ("110m haies");
INSERT INTO Epreuve (nom_epreuve) VALUES ("Badminton");
INSERT INTO Epreuve (nom_epreuve) VALUES ("Football");

create table Manifestation(
    id_manif int not null auto_increment,
    nom_manif varchar(25),
    date_manif date,
    id_iut int,
    primary key (id_manif),
    constraint fk_manif_iut foreign key(id_iut) references Iut(id_iut)
        on update cascade on delete cascade
);

INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("iaculis","2014-11-12",12);
INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("vel","2016-02-15",9);
INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("eget","2016-05-14",1);
INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("penatibus","2016-05-12",1);
INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("lectus","2012-11-25",15);
INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("facilisi.","2015-07-21",2);
INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("lacus","2012-11-22",13);
INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("Etiam","2012-11-16",4);
INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("Fusce","2014-09-08",17);
INSERT INTO Manifestation (nom_manif,date_manif,id_iut) VALUES ("luctus","2014-02-19",2);

create table Etudiant(
    id_etu int not null auto_increment,
    nom_etu varchar(25),
    date_naissance_etu date,
    sexe_etu boolean,
    id_iut int,
    primary key (id_etu),
    constraint fk_etu_iut foreign key(id_iut) references Iut(id_iut)
        on update cascade on delete cascade
);

INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Colt","2014-10-01",1,14);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Catherine","2012-12-21",1,8);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Wilma","2014-10-29",1,17);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Patience","2013-10-23",0,4);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Brynn","2013-05-16",0,6);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Echo","2015-04-20",0,19);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Elaine","2013-03-16",1,9);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Jason","2015-12-26",1,9);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Yuri","2013-03-20",0,7);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Arsenio","2013-06-10",0,18);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Kyle","2016-06-16",1,13);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Deborah","2014-04-11",1,10);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Margaret","2013-06-19",1,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Jada","2015-08-10",0,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Martina","2013-09-12",1,8);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Thane","2016-01-03",1,10);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Scott","2016-06-20",0,7);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Edward","2014-08-25",1,19);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Nelle","2014-01-15",1,20);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Ainsley","2015-11-11",1,8);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Stacey","2013-04-16",0,20);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Kadeem","2016-07-04",1,15);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Yoshio","2015-02-01",0,9);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Charles","2015-01-13",1,18);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Imelda","2013-02-15",0,10);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Robin","2012-10-29",0,8);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Drew","2015-07-31",1,11);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Leilani","2015-10-27",0,4);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Jolie","2016-05-21",1,16);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Jessamine","2013-06-05",1,10);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Serina","2015-03-13",1,15);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Reed","2014-05-24",0,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Justin","2015-12-13",0,8);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Vera","2013-10-20",1,20);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Sage","2014-11-27",1,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Fay","2014-10-01",1,8);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Nadine","2015-05-01",0,7);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Dahlia","2016-06-09",1,13);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Holly","2013-07-27",0,12);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Cleo","2015-12-29",1,12);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Nehru","2015-09-01",0,9);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Indira","2013-07-29",0,16);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Micah","2016-08-23",1,3);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Amir","2013-07-24",1,14);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Aladdin","2014-01-13",1,13);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Dalton","2012-12-15",1,8);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Lester","2016-01-20",1,9);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Vielka","2013-01-31",1,2);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Kirestin","2014-04-01",0,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Buffy","2015-10-04",0,17);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Noble","2015-02-20",0,6);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Burke","2015-10-19",0,10);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Vanna","2012-11-11",0,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Aristotle","2013-07-27",0,19);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Ori","2014-02-05",0,9);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Gloria","2014-10-12",0,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Phyllis","2013-09-28",0,15);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Ciara","2015-12-15",1,10);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Duncan","2016-04-09",1,13);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Jessamine","2014-05-06",1,20);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Eliana","2015-06-07",0,1);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Kevin","2015-01-31",1,11);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Alvin","2014-01-02",0,14);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Driscoll","2013-05-10",1,18);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Chester","2015-03-15",0,2);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Lydia","2014-12-27",1,11);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Sheila","2015-03-17",0,12);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Lila","2013-07-14",1,12);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Ava","2016-02-09",1,3);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Noel","2016-01-28",0,16);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Nathan","2015-09-26",1,4);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Oliver","2016-05-21",0,14);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Danielle","2014-09-09",0,4);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Thane","2016-05-30",0,14);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Quon","2013-11-25",1,19);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Sigourney","2014-12-30",0,11);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Herman","2013-09-09",0,18);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Zahir","2014-02-13",1,10);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Kyle","2014-12-21",1,7);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Micah","2014-11-12",1,13);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Jakeem","2014-07-13",0,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Maisie","2015-05-09",1,9);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Flynn","2015-05-18",0,12);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Jeremy","2013-06-05",0,2);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Caleb","2015-02-01",1,15);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Ashely","2015-10-20",1,1);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Lillith","2014-08-27",0,4);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Joy","2012-10-17",0,18);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Wyatt","2015-02-05",1,14);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Dillon","2014-12-21",0,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Tatiana","2014-09-26",1,9);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Cailin","2013-10-20",0,8);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Kiayada","2014-08-03",1,12);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Cairo","2015-01-20",0,14);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Connor","2016-07-28",0,11);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Wylie","2014-04-11",0,5);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Yvette","2015-09-08",0,7);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Byron","2014-09-16",1,9);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Alexandra","2012-11-01",1,3);
INSERT INTO Etudiant (nom_etu,date_naissance_etu,sexe_etu,id_iut) VALUES ("Oliver","2014-09-13",1,10);

create table Participe(
    id_manif int,
    id_epreuve int,
    id_etu int,
    resultat int,
    primary key( id_manif, id_epreuve, id_etu),
    constraint fk_participe_manif foreign key(id_manif) references Manifestation(id_manif)
        on update cascade on delete cascade,
    constraint fk_participe_epreuve foreign key(id_epreuve) references Epreuve(id_epreuve)
        on update cascade on delete cascade,
    constraint fk_participe_etu foreign key(id_etu) references Etudiant(id_etu)
        on update cascade on delete cascade
);

-- La dixième manifestation a battu les records de fréquentation
-- Les classement de chaque étudiant test est son id
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (6,1,1,1);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (9,1,2,2);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,3,3);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (8,4,4,4);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (9,3,5,5);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (1,1,6,6);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,7,7);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,8,8);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (5,4,9,9);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,10,10);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (2,2,11,11);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,12,12);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,13,13);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,14,14);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,15,15);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (2,2,16,16);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (6,5,17,17);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (5,1,18,18);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,19,19);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,20,20);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (1,1,21,21);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,4,22,22);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,23,23);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,24,24);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (2,2,25,25);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (3,4,26,26);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,27,27);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (4,1,28,28);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,29,29);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (2,1,30,30);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (5,3,31,31);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,32,32);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,33,33);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,34,34);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,35,35);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,36,36);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (4,2,37,37);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (3,1,38,38);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (5,5,39,39);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (4,5,40,40);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,41,41);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,42,42);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (4,4,43,43);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (4,1,44,44);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (2,1,45,45);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,46,46);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,47,47);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,48,48);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (2,1,49,49);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,50,50);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (8,3,51,51);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (8,3,52,52);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,53,53);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,54,54);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (8,4,55,55);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,56,56);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (1,1,57,57);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,58,58);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,59,59);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (7,4,60,60);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (9,1,61,61);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,62,62);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,63,63);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,64,64);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (4,2,65,65);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,66,66);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,67,67);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (2,2,68,68);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,4,69,69);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (4,1,70,70);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (9,5,71,71);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,72,72);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (4,5,73,73);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,1,74,74);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (3,1,75,75);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,76,76);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (3,3,77,77);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,4,78,78);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,79,79);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,80,80);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,81,81);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (9,2,82,82);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,83,83);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,84,84);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (5,5,85,85);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (8,4,86,86);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,87,87);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (3,5,88,88);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (6,4,89,89);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (1,1,90,90);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,91,91);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,5,92,92);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,4,93,93);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (2,1,94,94);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (1,1,95,95);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (4,4,96,96);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,4,97,97);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,3,98,98);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (3,4,99,99);
INSERT INTO Participe (id_manif,id_epreuve,id_etu,resultat) VALUES (10,2,100,100);

create table Contenu(
    id_manif int,
    id_epreuve int,
    primary key(id_manif, id_epreuve),
    constraint fk_contenu_manif foreign key(id_manif) references Manifestation(id_manif)
        on update cascade on delete cascade,
    constraint fk_contenu_epreuve foreign key(id_epreuve) references Epreuve(id_epreuve)
        on update cascade on delete cascade
);

-- la première manifestation ne contient que du saut en longueur
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("1","1");
-- la seconde manifestation contient du saut en longueur et du vtt
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("2","1");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("2","2");
-- toutes les autres manifestations possèdent les 5 épreuves
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("3","1");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("3","2");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("3","3");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("3","4");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("3","5");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("4","1");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("4","2");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("4","3");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("4","4");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("4","5");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("5","1");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("5","2");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("5","3");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("5","4");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("5","5");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("6","1");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("6","2");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("6","3");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("6","4");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("6","5");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("7","1");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("7","2");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("7","3");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("7","4");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("7","5");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("8","1");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("8","2");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("8","3");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("8","4");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("8","5");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("9","1");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("9","2");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("9","3");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("9","4");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("9","5");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("10","1");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("10","2");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("10","3");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("10","4");
INSERT INTO Contenu (id_manif,id_epreuve) VALUES ("10","5");
