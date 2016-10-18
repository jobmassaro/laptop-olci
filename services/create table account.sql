Controllare che sia installato :

apt-get install php5-gd // per quel che riguarda il file excel



create table account
(
	id int(6) unsigned not null auto_increment primary key,
	name varchar(100) not null,
	password varchar(100) not null,
	role int(6) not null,
	category varchar(20) not null,
	token varchar(20) not null


)


insert into account (id,name,password,role) values (null,'adminolci',sha1('adminolci'), 1);

insert into account (id,name,password,role) values (null,'utentiolci',sha1('utentiolci'), 2);

insert into account (id,name,password,role) values (null,'fornitoreolci',sha1('fornitoreolci'), 3);

alter table account add category varchar(20) not null;
alter table account add token varchar(20) not null;



truncate table account;



create table tbl_olci_head
(
	id int(6) unsigned not null primary key auto_increment,
	nome_disegno_tabella varchar(100) null,
	progetto varchar(100) null,
	rev_tabella varchar(100) null,
	creato varchar(100) null,
	linea varchar(100) null,
	controllato varchar(100) null,
	ultima_modifica varchar(100) null,
 	numero_disegno_linea  varchar(100) NULL,
 	compilatore           varchar(100) NULL, 
 	acronimo_linea        varchar(100) NULL,
 	acronimo_linea2       varchar(100) NULL,
	plant                 varchar(100) NULL,
 	modello               varchar(100) NULL,
 	livello               varchar(100) NULL

);



create table tbl_olci_body
(
	id                    	   int (6) unsigned not null primary key auto_increment,
	id_head                    int(3)  not null,   
	prog                       varchar(100)null,
	p0                         varchar(6) null, 
	p1                         varchar(6) NULL,
	p2                         varchar(6) NULL,
	p3                         varchar(6) null,
	p4                         varchar(6) null,
	p5                         varchar(6) null,
	p6                         varchar(6) null,
	STAZIONE                   varchar(100) null,
	CODICE_STRUTTURA           varchar(100) null,
	DISEGNO_FORNITORE          varchar(100) null,
	DISEGNO_CLIENTE            varchar(100) null,
	FILE_ORIGINALE             varchar(100) null,
	TOTALE_FOGLI               varchar(100) null,
	FOGLI_RICEVUTI             varchar(100) null,
	DESCRIZIONE_ITALIANO       varchar(100) null,
	DESCRIZIONE_INGLESE        varchar(100) null,
	DESCRIZIONE_LINGUA_LOCALE  varchar(100) null,
	File_di_Stampa_Rev         varchar(100) null,
	File_Originale_Rev         varchar(100) null,
	FORNITORE                  varchar(100) null,
	Data                       varchar(100) null,
	NOTE             		   varchar(100) null default 'SENZA DISTINTA',
	DISTINTA_MECCANICA  	   varchar(100) null,
	DISTINTA_FLUIDICA   	   varchar(100) null,
	DISTINTA_ELETTRICA  	   varchar(100) null,
	DISTINTA_LAYOUT		  	   varchar(100) null,
	DISTINTA_GENERALI	  	   varchar(100) null,
	DISTINTA_STANDARD	  	   varchar(100) null,
	DISTINTA_FREE		  	   varchar(100) null,
	RA 					  	   varchar(100) null 


);

ALTER TABLE tbl_olci_body AUTO_INCREMENT = 1;



CREATE TABLE tbl_olci_distinta_base 
(
	id int (3)UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_lista int(3)not null,
	id_distbase int(3)not null,
	gruppo varchar(50) null,
	data varchar(50) null,
	sheet varchar(50) null,
	titolo varchar(500) null,
	pos int(3) null,
	drwno int(5) null,
	denominazione varchar(150) null,
	qta int(10) null,
	materiale varchar(100) null,
	trattamento varchar(100) null,
	processing varchar(100) null,
	welding varchar(100) null,
	ricambio varchar(100) null,
	rev varchar(100) null,
	foglio varchar(5) null,
	disegno_no varchar(100) null,
	consegne varchar(100) null


);


CREATE TABLE tbl_olci_lista_distinta_base 
(
	id int (3)UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_distbase int(3)not null,
	disegno_no varchar(100) null,
	gruppo varchar(50) null,
	data varchar(50) null,
	sheet varchar(50) null,
	titolo varchar(500) null,
	layout varchar(500) null,
	DISTINTA_MECCANICA  	   varchar(100) null,
	DISTINTA_FLUIDICA   	   varchar(100) null,
	DISTINTA_ELETTRICA  	   varchar(100) null,
	DISTINTA_LAYOUT		  	   varchar(100) null,
	DISTINTA_GENERALI	  	   varchar(100) null,
	DISTINTA_STANDARD	  	   varchar(100) null,
	DISTINTA_FREE		  	   varchar(100) null,
	RA 					  	   varchar(100) null,
	revisione				   varchar(5)   null default 'A',
	distinta_base_completata   enum('false', 'true') NOT NULL DEFAULT 'false', 	
	approvata 				   varchar(5)   null


);