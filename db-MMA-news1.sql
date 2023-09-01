-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Mon Aug 28 11:32:46 2023 
-- * LUN file: C:\Users\julie\OneDrive\Bureau\db-MMA-news.lun 
-- * Schema: mma1/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database mma1;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

CREATE TABLE utilisateur (
    ID_utilisateur INT NOT NULL AUTO_INCREMENT,
    Nom VARCHAR(100) NOT NULL,
    Prenom VARCHAR(100) NOT NULL,
    Pseudo VARCHAR(100) NOT NULL,
    Adresse_e_mail_ VARCHAR(255) NOT NULL,
    Mot_de_passe VARCHAR(50) NOT NULL,
    PRIMARY KEY (ID_utilisateur)
);

CREATE TABLE Visiteur (
    ID_Vis INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID_Vis)
);

CREATE TABLE Actualite_MMA__ (
    ID_news INT NOT NULL AUTO_INCREMENT,
    Titre VARCHAR(255) NOT NULL,
    Contenu VARCHAR(255) NOT NULL,
    Date DATE NOT NULL,
    Img_News VARCHAR(255) NOT NULL,
    ID_utilisateur INT NOT NULL,
    PRIMARY KEY (ID_news),
    FOREIGN KEY (ID_utilisateur) REFERENCES utilisateur(ID_utilisateur)
);

CREATE TABLE Combattant__de__MMA__ (
    ID_fighter INT NOT NULL AUTO_INCREMENT,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    Surnom VARCHAR(30) NOT NULL,
    Taille NUMERIC(3, 1) NOT NULL,
    Age NUMERIC(2) NOT NULL,
    Palmares NUMERIC(10) NOT NULL,
    Img_combattant VARCHAR(255) NOT NULL,
    Style VARCHAR(100) NOT NULL,
    ID_utilisateur INT NOT NULL,
    PRIMARY KEY (ID_fighter),
    FOREIGN KEY (ID_utilisateur) REFERENCES utilisateur(ID_utilisateur)
);

CREATE TABLE Contact (
    ID_contact INT NOT NULL AUTO_INCREMENT,
    Nom VARCHAR(100) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Telephone VARCHAR(13) NOT NULL,
    Message VARCHAR(255) NOT NULL,
    ID_utilisateur INT NOT NULL,
    ID_Vis INT NOT NULL, -- Change this to match the appropriate data type
    PRIMARY KEY (ID_contact),
    FOREIGN KEY (ID_utilisateur) REFERENCES utilisateur(ID_utilisateur)
    -- Add FOREIGN KEY for ID_Vis referencing Visiteur(ID_Vis) if necessary
);

CREATE TABLE Organisation_MMA_ (
    ID_orga INT NOT NULL AUTO_INCREMENT,
    ID_fighter INT NOT NULL,
    Nom_ VARCHAR(100) NOT NULL,
    Pays VARCHAR(1) NOT NULL,
    Annee_de_fondation NUMERIC(10) NOT NULL,
    Logo_organisation VARCHAR(255) NOT NULL,
    Description VARCHAR(255) NOT NULL,
    ID_utilisateur INT NOT NULL,
    PRIMARY KEY (ID_orga),
    FOREIGN KEY (ID_fighter) REFERENCES Combattant__de__MMA__(ID_fighter),
    FOREIGN KEY (ID_utilisateur) REFERENCES utilisateur(ID_utilisateur)
);

CREATE TABLE Commentaire (
    ID_question INT NOT NULL AUTO_INCREMENT,
    Contenu VARCHAR(255) NOT NULL,
    Date DATE NOT NULL,
    ID_utilisateur INT NOT NULL,
    PRIMARY KEY (ID_question),
    FOREIGN KEY (ID_utilisateur) REFERENCES utilisateur(ID_utilisateur)
);

CREATE TABLE Reponse (
    ID_reponse INT NOT NULL AUTO_INCREMENT,
    Contenu VARCHAR(255) NOT NULL,
    Date DATE NOT NULL,
    ID_utilisateur INT NOT NULL,
    ID_question INT NOT NULL,
    PRIMARY KEY (ID_reponse),
    FOREIGN KEY (ID_utilisateur) REFERENCES utilisateur(ID_utilisateur),
    FOREIGN KEY (ID_question) REFERENCES Commentaire(ID_question)
);

CREATE TABLE Inscription_Newsletter (
    ID_newsletter INT NOT NULL AUTO_INCREMENT,
    Email VARCHAR(255) NOT NULL,
    Date_d_inscription DATE NOT NULL,
    ID_news INT NOT NULL,
    ID_Vis INT NOT NULL, -- Change this to match the appropriate data type
    PRIMARY KEY (ID_newsletter),
    FOREIGN KEY (ID_news) REFERENCES Actualite_MMA__(ID_news),
    FOREIGN KEY (ID_Vis) REFERENCES Visiteur(ID_Vis)
);




