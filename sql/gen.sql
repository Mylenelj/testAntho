/*creation de la base de données*/
CREATE DATABASE BLOG CHARACTER SET utf8;

/*utilisation de la base de données*/
USE BLOG;

/*creation des tables*/
CREATE TABLE Billet(
	/*declaration des colonnes*/
	ID			int	unsigned not null auto_increment,
	
	parution	datetime not null default current_timestamp,
	titre		varchar(100) not null,
	contenu		text not null,
	
	/*indexation de la clé primaire*/
	PRIMARY KEY (ID)
) ENGINE=innoDB;

CREATE TABLE Commentaire(
	/*declaration des colonnes*/
	ID			int	unsigned not null auto_increment,
	
	parution	datetime not null default current_timestamp,
	auteur		varchar(100) not null,
	contenu		tinytext not null,
	
	billetID	int unsigned not null,
	
	/*indexation*/
	PRIMARY KEY (ID),
	FOREIGN KEY (billetID) REFERENCES Billet(ID)
) ENGINE=innoDB;