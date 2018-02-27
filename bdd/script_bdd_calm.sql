#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE IF EXISTS calm;
CREATE DATABASE IF NOT EXISTS calm;
use calm;


#------------------------------------------------------------
# Table: plat
#------------------------------------------------------------

CREATE TABLE plat(
        id_plat     int (11) Auto_increment  NOT NULL ,
        nom         Varchar (25) NOT NULL ,
        photo       Varchar (25) ,
        description Varchar (200) NOT NULL,
        vegetarien Bool NOT NULL ,
        id_prix     Int ,
        PRIMARY KEY (id_plat )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prix
#------------------------------------------------------------

CREATE TABLE prix(
        id_prix int (11) Auto_increment  NOT NULL ,
        prix    Float NOT NULL ,
        PRIMARY KEY (id_prix )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ingredient
#------------------------------------------------------------

CREATE TABLE ingredient(
        id_ingredient int (11) Auto_increment  NOT NULL ,
        nom           Varchar (25) NOT NULL ,
        PRIMARY KEY (id_ingredient )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commande
#------------------------------------------------------------

CREATE TABLE commande(
        id_commande int (11) Auto_increment  NOT NULL ,
        nom         Varchar (25) NOT NULL ,
        prenom      Varchar (25) NOT NULL ,
        numero      Int NOT NULL ,
        id_plat     Int ,
        PRIMARY KEY (id_commande )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: possede
#------------------------------------------------------------

CREATE TABLE possede(
        id_plat       Int NOT NULL ,
        id_ingredient Int NOT NULL ,
        PRIMARY KEY (id_plat ,id_ingredient )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: evenement
#------------------------------------------------------------

CREATE TABLE evenement(
        id_evenement     Int NOT NULL ,
        nom              Varchar (25) NOT NULL ,
        lien             Varchar (100) NOT NULL ,
        PRIMARY KEY (id_evenement )
)ENGINE=InnoDB;



ALTER TABLE plat ADD CONSTRAINT FK_plat_id_prix FOREIGN KEY (id_prix) REFERENCES prix(id_prix);
ALTER TABLE commande ADD CONSTRAINT FK_commande_id_plat FOREIGN KEY (id_plat) REFERENCES plat(id_plat);
ALTER TABLE possede ADD CONSTRAINT FK_possede_id_plat FOREIGN KEY (id_plat) REFERENCES plat(id_plat);
ALTER TABLE possede ADD CONSTRAINT FK_possede_id_ingredient FOREIGN KEY (id_ingredient) REFERENCES ingredient(id_ingredient);
