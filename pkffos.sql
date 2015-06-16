drop database if exists pitajteknjiznicare;
create database pitajteknjiznicare default character set utf8 collate utf8_general_ci;
use pitajteknjiznicare;




create table uloga(
	sifra int not null primary key auto_increment,
	naziv varchar(50) not null
)engine=innodb;

create table operater(
	sifra int not null primary key auto_increment,
	ime varchar(50) not null,
	prezime varchar(50) not null,
	email varchar (50) not null,
	lozinka char(32) not null,
	uloga int not null
)engine=innodb;

create table podrucje(
	sifra int not null primary key auto_increment,
	naziv varchar(50) not null
)engine=innodb;

create table jezik(
	sifra int not null primary key auto_increment,
	naziv varchar(50) not null
)engine=innodb;

create table studij(
	sifra int not null primary key auto_increment,
	naziv text not null
)engine=innodb;

create table godina(
	sifra int not null primary key auto_increment,
	naziv varchar(50) not null
)engine=innodb;

create table godina_student(
sifra int not null primary key auto_increment,
godina int not null,
student int not null
)engine=innodb;

create table student(
	sifra int not null primary key auto_increment,
	JMBAG char(10),
	ime varchar(50) not null,
	prezime varchar(50) not null,
	email varchar(50) not null,
	studij int not null
)engine=innodb;

create table upit(
	sifra int not null primary key auto_increment,
	godina_student int not null,
	kolegij varchar (200) not null,
	podrucje int not null,
	pitanje text not null,
	datum_pitanja date,
	odgovor text,
	odgovor_datum date
)engine=innodb;

create table upit_jezik(
	upit int not null,
	jezik int not null
)engine=innodb;
	
	
alter table operater add foreign key (uloga) references uloga(sifra);
alter table student add foreign key (studij) references studij(sifra);
alter table godina_student add foreign key (godina) references godina(sifra);
alter table godina_student add foreign key (student) references student(sifra);
alter table upit add foreign key (godina_student) references godina_student(sifra);
alter table upit add foreign key (podrucje) references podrucje(sifra);
alter table upit_jezik add foreign key (upit) references upit(sifra);
alter table upit_jezik add foreign key (jezik) references jezik(sifra);



insert into uloga(naziv) values('admin');
insert into uloga(naziv) values('korisnik');


insert into operater(ime, prezime, email, lozinka, uloga) values ('Maja', 'Klajić', 'mklajic@ffos.hr', md5('m'), 1);
insert into operater(ime, prezime, email, lozinka, uloga) values ('Ivana', 'Čadovska', 'icadovska@ffos.hr', md5('i'), 2);
insert into operater(ime, prezime, email, lozinka, uloga) values ('Gordana', 'Gašo', 'ggaso@ffos.hr', md5('g'), 2);
insert into operater(ime, prezime, email, lozinka, uloga) values ('Lana', 'Šuster', 'lsuster@ffos.hr', md5('l'), 2);
insert into operater(ime, prezime, email, lozinka, uloga) values ('Zsolt', 'Vačora', 'zvacora@ffos.hr', md5('z'), 2);
insert into operater(ime, prezime, email, lozinka, uloga) values ('Vesna', 'Radičević', 'vradicev@ffos.hr', md5('v'), 2);
insert into operater(ime, prezime, email, lozinka, uloga) values ('Anita', 'Bajić', 'abajic1@ffos.hr', md5('a'), 2);

insert into jezik(naziv) values('Hrvatski jezik');
insert into jezik(naziv) values('Engleski jezik');
insert into jezik(naziv) values('Njemački jezik');
insert into jezik(naziv) values('Mađarski jezik');
insert into jezik(naziv) values('Srpski jezik - latinica');
insert into jezik(naziv) values('Srpski jezik - ćirilica');

insert into godina(naziv) values('I. godina preddiplomskog studija');
insert into godina(naziv) values('II. godina preddiplomskog studija');
insert into godina(naziv) values('III. godina preddiplomskog studija');
insert into godina(naziv) values('I. godina diplomskog studija');
insert into godina(naziv) values('II. godina diplomskog studija');
insert into godina(naziv) values('I. godina postdiplomskog studija');
insert into godina(naziv) values('II. godina postdiplomskog studija');
insert into godina(naziv) values('III. godina postdiplomskog studija');

insert into podrucje(naziv) values('Informacijske znanosti');
insert into podrucje(naziv) values('Filozofija');
insert into podrucje(naziv) values('Psihologija');
insert into podrucje(naziv) values('Pedagogija');
insert into podrucje(naziv) values('Hrvatski jezik i književnost');
insert into podrucje(naziv) values('Njemački jezik i književnost');
insert into podrucje(naziv) values('Engleski jezik i književnost');
insert into podrucje(naziv) values('Mađarski jezik i književnost');
insert into podrucje(naziv) values('Povijest');
insert into podrucje(naziv) values('Umjetnost');

insert into studij(naziv) values('Hrvatski jezik i književnost');
insert into studij(naziv) values('Informatologija');
insert into studij(naziv) values('Njemački jezik i književnost');
insert into studij(naziv) values('Psihologija');
insert into studij(naziv) values('Engleski jezik i književnost i hrvatski jezik i književnost');
insert into studij(naziv) values('Engleski jezik i književnost i njemački jezik i književnost');
insert into studij(naziv) values('Engleski jezik i književnost i pedagogija');
insert into studij(naziv) values('Engleski jezik i književnost i povijest');
insert into studij(naziv) values('Filozofija i engleski jezik i književnost');
insert into studij(naziv) values('Filozofija i hrvatski jezik i književnost');
insert into studij(naziv) values('Filozofija i pedagogija');
insert into studij(naziv) values('Filozofija i povijest');
insert into studij(naziv) values('Hrvatski jezik i književnost i pedagogija');
insert into studij(naziv) values('Hrvatski jezik i književnost i povijest');
insert into studij(naziv) values('Mađarski jezik i književnost i engleski jezik i književnost');
insert into studij(naziv) values('Mađarski jezik i književnost i hrvatski jezik i književnost');
insert into studij(naziv) values('Mađarski jezik i književnost i povijest');
insert into studij(naziv) values('Njemački jezik i književnost i filozofija');
insert into studij(naziv) values('Njemački jezik i književnost i hrvatski jezik i književnost');
insert into studij(naziv) values('Njemački jezik i književnost i povijest');
insert into studij(naziv) values('Pedagogija i povijest');
insert into studij(naziv) values('Jezikoslovlje');
insert into studij(naziv) values('Pedagogija i kultura suvremene škole');
insert into studij(naziv) values('Književnost i kulturni identitet');
