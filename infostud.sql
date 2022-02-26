DROP DATABASE IF EXISTS Infostud;
CREATE DATABASE Infostud;
USE Infostud;

CREATE TABLE Poslodavci(
    
    idPoslodavca int AUTO_INCREMENT NOT NULL,
    imePoslodavca varchar(50),
    email varchar(50),
    sifra varchar(50),
    PRIMARY KEY(idPoslodavca)
    );


CREATE TABLE Poslovi(
	
	idPosla INT AUTO_INCREMENT NOT NULL ,
	imePosla varchar(50),
	idPoslodavca INT,
	opisPosla varchar(1000),
	mesto varchar(50),
	datumIsteka varchar(20),
	PRIMARY KEY(idPosla),
	FOREIGN KEY(idPoslodavca) REFERENCES Poslodavci(idPoslodavca)

);

CREATE TABLE Kandidati(

	id INT AUTO_INCREMENT NOT NULL,
	idKandidata BIGINT,
	email varchar(30),
	password varchar(50),
	PRIMARY KEY (id)

);

INSERT INTO Poslodavci (imePoslodavca,email,sifra) VALUES("Forma Ideale","forma@gmail.com","forma");
INSERT INTO Poslodavci (imePoslodavca,email,sifra) VALUES("Q Agency","qagency@gmail.com","qagency");
INSERT INTO Poslodavci (imePoslodavca,email,sifra) VALUES("Comtrade","comtrade@gmail.com","comtrade");
INSERT INTO Poslodavci (imePoslodavca,email,sifra) VALUES("Trnava Promet","trnava@gmail.com","trnava");



INSERT INTO Poslovi(imePosla,idPoslodavca,opisPosla,mesto,datumIsteka) VALUES ("Software developer", 2, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut  ","Kragujevac","30.3.2022.");
INSERT INTO Poslovi(imePosla,idPoslodavca,opisPosla,mesto,datumIsteka) VALUES ("Prodavac", 4, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut  ","Topola","30.3.2022.");
INSERT INTO Poslovi(imePosla,idPoslodavca,opisPosla,mesto,datumIsteka) VALUES ("Magacioner", 4, " sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut ","Topola","30.3.2022.");



