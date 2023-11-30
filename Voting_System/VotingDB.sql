CREATE DATABASE votingdb;

USE votingdb;

CREATE TABLE election_commissioner (
  Name varchar(100) NOT NULL,
  Password varchar(100) NOT NULL,
  Aadhaar varchar(100) NOT NULL,
  PRIMARY KEY (Aadhaar)
);

CREATE TABLE election_name (
  id int NOT NULL AUTO_INCREMENT,
  type varchar(100) NOT NULL,
  active int NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE party (
  pname varchar(100) NOT NULL,
  leader varchar(100) NOT NULL,
  symbol varchar(100) NOT NULL,
  Aadhaar_leader varchar(100) NOT NULL,
  active int NOT NULL,
  PRIMARY KEY (pname)
);

CREATE TABLE ls (
  name varchar(100) NOT NULL,
  aadhaar varchar(100) NOT NULL UNIQUE,
  party varchar(100) NOT NULL,
  constituency varchar(100) NOT NULL,
  count int NOT NULL,
  PRIMARY KEY (aadhaar),
  CONSTRAINT fk1 FOREIGN KEY (party) REFERENCES party (pname) ON DELETE CASCADE
);

CREATE TABLE vs (
  name varchar(100) NOT NULL,
  aadhaar varchar(100) NOT NULL UNIQUE,
  party varchar(100) NOT NULL,
  constituency varchar(100) NOT NULL,
  count int NOT NULL,
  PRIMARY KEY (aadhaar),
  CONSTRAINT fk2 FOREIGN KEY (party) REFERENCES party (pname) ON DELETE CASCADE
);


CREATE TABLE backup_vs (
  id int NOT NULL AUTO_INCREMENT,
  election varchar(100) NOT NULL,
  party varchar(100) NOT NULL,
  votes int NOT NULL,
  PRIMARY KEY (id)
) ;

CREATE TABLE backup_ls (
  id int NOT NULL AUTO_INCREMENT,
  election varchar(100) NOT NULL,
  party varchar(100) NOT NULL,
  votes int NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE voter (
  id int NOT NULL AUTO_INCREMENT,
  Name varchar(100) NOT NULL,
  Aadhaar varchar(100) NOT NULL UNIQUE,
  Password varchar(100) NOT NULL,
  LS varchar(100) NOT NULL,
  VS varchar(100) NOT NULL,
  Photo varchar(100) NOT NULL,
  status int NOT NULL,
  active int NOT NULL,
  PRIMARY KEY (id,Aadhaar)
);

INSERT INTO election_commissioner(Name,Password,Aadhaar) VALUES (Admin1,123,123445677891);

