-- Script de création de la base de données SORTIES
--   type :      SQL Server 2012
--

USE SortirEnsemble
go

CREATE TABLE ETATS (
    idEtat   INTEGER NOT NULL,
    libelle   VARCHAR(30) NOT NULL
)

ALTER TABLE ETATS ADD constraint etats_pk PRIMARY KEY (idEtat)
GO

CREATE TABLE INSCRIPTIONS (
    date_inscription              smalldatetime NOT NULL,
    sorties_idSortie             INTEGER NOT NULL,
    participants_idParticipant   INTEGER NOT NULL
)

ALTER TABLE INSCRIPTIONS ADD constraint inscriptions_pk PRIMARY KEY  (SORTIES_idSortie, PARTICIPANTS_idParticipant)
GO

CREATE TABLE LIEUX (
    idLieu         INTEGER NOT NULL,
    nom_lieu        VARCHAR(30) NOT NULL,
    rue             VARCHAR(30),
    latitude           FLOAT,
    longitude          FLOAT,
    villes_idVille   INTEGER NOT NULL,
)

ALTER TABLE LIEUX ADD constraint lieux_pk PRIMARY KEY  (idLieu)
GO

CREATE TABLE PARTICIPANTS (
    idParticipant   INTEGER NOT NULL,
	pseudo           VARCHAR(30) NOT NULL,
    nom              VARCHAR(30) NOT NULL,
    prenom           VARCHAR(30) NOT NULL,
    telephone        VARCHAR(15),
    mail             VARCHAR(20) NOT NULL,
	mot_de_passe	 VARCHAR(20) NOT NULL,
    administrateur   bit NOT NULL,
    actif            bit NOT NULL,
	sites_idSite    INTEGER NOT NULL
)

ALTER TABLE PARTICIPANTS ADD constraint participants_pk PRIMARY KEY  (idParticipant)

ALTER TABLE PARTICIPANTS add constraint participants_pseudo_uk unique (pseudo)
GO

CREATE TABLE SITES (
    idSite       INTEGER NOT NULL,
    nom_site      VARCHAR(30) NOT NULL
)

ALTER TABLE SITES ADD constraint sites_pk PRIMARY KEY (idSite)
GO

CREATE TABLE SORTIES (
    idSortie                     INTEGER NOT NULL,
    nom                           VARCHAR(30) NOT NULL,
    datedebut                     smalldatetime NOT NULL,
    duree                         INTEGER,
    datecloture                   smalldatetime NOT NULL,
    nbinscriptionsmax             INTEGER NOT NULL,
    descriptioninfos              VARCHAR(500),
    etatsortie                    INTEGER,
	urlPhoto                      VARCHAR(250),
    organisateur                  INTEGER NOT NULL,
    lieux_idLieu                 INTEGER NOT NULL,
    etats_idEtat                 INTEGER NOT NULL
)

ALTER TABLE SORTIES ADD constraint sorties_pk PRIMARY KEY  (idSortie)
GO

CREATE TABLE VILLES (
    idVille      INTEGER NOT NULL,
    nom_ville     VARCHAR(30) NOT NULL,
    code_postal   VARCHAR(10) NOT NULL
)

ALTER TABLE VILLES ADD constraint villes_pk PRIMARY KEY  (idVille)

ALTER TABLE INSCRIPTIONS
    ADD CONSTRAINT inscriptions_participants_fk FOREIGN KEY ( participants_idParticipant )
        REFERENCES participants ( idParticipant )
ON DELETE NO ACTION 
    ON UPDATE no action 

ALTER TABLE INSCRIPTIONS
    ADD CONSTRAINT inscriptions_sorties_fk FOREIGN KEY ( sorties_idSortie )
        REFERENCES sorties ( idSortie )
ON DELETE NO ACTION 
    ON UPDATE no action 


ALTER TABLE LIEUX
    ADD CONSTRAINT lieux_villes_fk FOREIGN KEY ( villes_idVille )
        REFERENCES villes ( idVille )
ON DELETE NO ACTION 
    ON UPDATE no action 
	
ALTER TABLE SORTIES
    ADD CONSTRAINT sorties_etats_fk FOREIGN KEY ( etats_idEtat )
        REFERENCES etats ( idEtat )
ON DELETE NO ACTION 
    ON UPDATE no action 

ALTER TABLE SORTIES
    ADD CONSTRAINT sorties_lieux_fk FOREIGN KEY ( lieux_idLieu )
        REFERENCES lieux ( idLieu )
ON DELETE NO ACTION 
    ON UPDATE no action 

ALTER TABLE SORTIES
    ADD CONSTRAINT sorties_participants_fk FOREIGN KEY ( organisateur )
        REFERENCES participants ( idParticipant )
ON DELETE NO ACTION 
    ON UPDATE no action 
GO

