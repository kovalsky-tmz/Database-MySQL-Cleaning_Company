-- BAZA DANYCH TABELE


CREATE TABLE Klient (
    Pesel_klienta VARCHAR(11) NOT NULL PRIMARY KEY CHECK (length(Pesel_klienta)=11),
    Imie VARCHAR(25),
    Nazwisko VARCHAR(25) NOT NULL
);

CREATE TABLE Zlecenia (
    Id_zlecenia INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Pesel_klienta VARCHAR(11) NOT NULL CHECK (length(Pesel_klienta)=11),
    FOREIGN KEY (Pesel_klienta) REFERENCES Klient(Pesel_klienta) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Srodki_do_czyszczenia(
    Id_srodka INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nazwa_srodka VARCHAR(25),
    Cena INT
);

CREATE TABLE Urzadzenia(
    Id_urz INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nazwa_urz VARCHAR(25),
    Cena INT
);

CREATE TABLE Samochod(
    Nr_rejestracji VARCHAR(8) NOT NULL PRIMARY KEY,
    Marka VARCHAR(20),
    Model_auta VARCHAR(20),
    Rok_produkcji INT
);

CREATE TABLE Grupa(
    Id_grupy INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nr_Rejestracji VARCHAR(8) NOT NULL,
    Ilosc_osob INT CHECK (Ilosc_osob>0),
    FOREIGN KEY (Nr_Rejestracji) REFERENCES Samochod(Nr_Rejestracji) ON DELETE CASCADE
);

CREATE TABLE Pracownicy(
    Id_pracownika INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Imie VARCHAR(25),
    Nazwisko VARCHAR(25) NOT NULL,
    Data_zatrudnienia DATE,
    Id_grupy INT NOT NULL,
    Stanowisko VARCHAR(15) NOT NULL,
    Zarobek_roczny INT,
    FOREIGN KEY (Id_grupy) REFERENCES Grupa(Id_grupy) ON DELETE CASCADE
);

CREATE TABLE Czynnosci(
    Rodzaj_czynnosci VARCHAR(25) NOT NULL PRIMARY KEY,
    Id_urz INT,
    Id_srodka INT,
    FOREIGN KEY (Id_urz) REFERENCES Urzadzenia(Id_urz) ON DELETE CASCADE,
    FOREIGN KEY (Id_srodka) REFERENCES Srodki_do_czyszczenia(Id_srodka) ON DELETE CASCADE
);

CREATE TABLE Szczegoly_zlecenia(    -- UNIQUE WIELE DO WIELU
    Id_grupy INT NOT NULL, 
    Rodzaj_czynnosci VARCHAR(25) NOT NULL,
    Id_zlecenia INT NOT NULL,
    Data_przyjecia DATE NOT NULL,
    Data_wykonania DATE NOT NULL,
    Kwota_dochodu INT,
    FOREIGN KEY (Id_grupy) REFERENCES Grupa(Id_grupy) ON DELETE CASCADE,
    FOREIGN KEY (Rodzaj_czynnosci) REFERENCES Czynnosci(Rodzaj_czynnosci) ON DELETE CASCADE,
    FOREIGN KEY (Id_zlecenia) REFERENCES Zlecenia(Id_zlecenia) ON DELETE CASCADE,
    PRIMARY KEY (Id_grupy,Rodzaj_czynnosci,Id_zlecenia)
);



CREATE TABLE Pomieszczenie (
    Adres VARCHAR(25) NOT NULL PRIMARY KEY,
    Powierzchnia INT NOT NULL
);

CREATE TABLE Szczegoly_klienta (
    Pesel_klienta VARCHAR(25) NOT NULL CHECK (length(Pesel_klienta)=11),
    Adres VARCHAR(25) NOT NULL,
    Wiek INT,
    Nr_telefonu INT(9) NOT NULL,
    Miasto VARCHAR(25) NOT NULL,
    FOREIGN KEY (Pesel_klienta) REFERENCES Klient(Pesel_klienta) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (Adres) REFERENCES Pomieszczenie(Adres) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (Pesel_klienta,Adres)
);




-- WYPEŁNIENIE BAZY DANYMI

INSERT INTO Klient(Pesel_klienta,Imie,Nazwisko) Values ('94090606670','Tomasz','Kowalski');
INSERT INTO Klient(Pesel_klienta,Imie,Nazwisko) Values ('94090606671','Pawel','Nowak');
INSERT INTO Klient(Pesel_klienta,Imie,Nazwisko) Values ('94090606672','Iwona','Kruk');    

INSERT INTO Zlecenia(Pesel_klienta) Values ('94090606670' );
INSERT INTO Zlecenia(Pesel_klienta) Values ('94090606671' );
INSERT INTO Zlecenia(Pesel_klienta) Values ('94090606672' );

-- INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia) Values (ID_GRUPY.nextval,'94090706671','01/01/01',NULL );

INSERT INTO Srodki_do_czyszczenia(Nazwa_srodka,Cena) Values ('Dezynfekcja',200);
INSERT INTO Srodki_do_czyszczenia(Nazwa_srodka,Cena) Values ('Zestawy do dywanow',400);
INSERT INTO Srodki_do_czyszczenia(Nazwa_srodka,Cena) Values ('Farby',200);
INSERT INTO Srodki_do_czyszczenia(Nazwa_srodka,Cena) Values ('Odplamiacz',50);

INSERT INTO Urzadzenia(Nazwa_urz,Cena) Values ('Odkurzacz',300);
INSERT INTO Urzadzenia(Nazwa_urz,Cena) Values ('Odkurzacz pioracy',1000);
INSERT INTO Urzadzenia(Nazwa_urz,Cena) Values ('Szorowarka do podlog',600);

INSERT INTO Samochod(Nr_Rejestracji,Marka,Model_Auta,Rok_Produkcji) Values ('DW00001','Mercedes','S100',2001);
INSERT INTO Samochod(Nr_Rejestracji,Marka,Model_Auta,Rok_Produkcji) Values ('DW00002','Audi','S200',2002);
INSERT INTO Samochod(Nr_Rejestracji,Marka,Model_Auta,Rok_Produkcji) Values ('DW00003','Jaguar','S300',2003);
INSERT INTO Samochod(Nr_Rejestracji,Marka,Model_Auta,Rok_Produkcji) Values ('DW00004','Mercedes','S400',2004);
INSERT INTO Samochod(Nr_Rejestracji,Marka,Model_Auta,Rok_Produkcji) Values ('DW000013','Mercedes','S100',2001);
INSERT INTO Samochod(Nr_Rejestracji,Marka,Model_Auta,Rok_Produkcji) Values ('DW000014','Mercedes','S100',2001);

INSERT INTO Grupa(Nr_Rejestracji) Values ('DW00001');
INSERT INTO Grupa(Nr_Rejestracji) Values ('DW00002');
INSERT INTO Grupa(Nr_Rejestracji) Values ('DW00003');
INSERT INTO Grupa(Nr_Rejestracji) Values ('DW00004');


INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('A','A','01/01/01',1,'KIER',11111);
INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('B','B','02/02/02',1,'PRAC',NULL);
INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('C','C','03/03/03',2,'LID',NULL);
INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('D','D','04/04/04',2,'LID',NULL);
INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('E','E','05/05/05',3,'KIER',NULL);
INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('F','F','06/06/06',3,'PRAC',NULL);
INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('G','G','07/07/07',4,'PRAC',NULL);
INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('H','H','08/08/08',4,'PRAC',NULL);
INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('I','I','09/09/09',4,'PRAC',NULL);
INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('J','J','10/10/10',2,'PRAC',NULL);

INSERT INTO Czynnosci(Rodzaj_czynnosci,Id_urz,Id_srodka) Values ('Czyszczenie podlog',3,1);
INSERT INTO Czynnosci(Rodzaj_czynnosci,Id_urz,Id_srodka) Values ('Malowanie',1,3);
INSERT INTO Czynnosci(Rodzaj_czynnosci,Id_urz,Id_srodka) Values ('Odgrzybianie',null,1);
INSERT INTO Czynnosci(Rodzaj_czynnosci,Id_urz,Id_srodka) Values ('Pranie dywanow',2,2);

INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia,data_przyjecia,data_wykonania,Kwota_dochodu) Values (1,'Odgrzybianie',1,'01/01/01','02/02/02',null);
INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia,data_przyjecia,data_wykonania,Kwota_dochodu) Values (1,'Malowanie',1,'01/01/01','02/02/02',5555);
INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia,data_przyjecia,data_wykonania,Kwota_dochodu) Values (2,'Czyszczenie podlog',2,'01/01/01','02/02/02',6666);
INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia,data_przyjecia,data_wykonania,Kwota_dochodu) Values (2,'Czyszczenie podlog',3,'01/01/01','02/02/02',null);
INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia,data_przyjecia,data_wykonania,Kwota_dochodu) Values (3,'Czyszczenie podlog',3,'01/01/01','02/02/02',null);
INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia,data_przyjecia,data_wykonania,Kwota_dochodu) Values (3,'Pranie dywanow',1,'01/01/01','02/02/02',null);
INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia,data_przyjecia,data_wykonania,Kwota_dochodu) Values (4,'Malowanie',2,'01/01/01','02/02/02',null);


INSERT INTO Pomieszczenie(Adres,Powierzchnia) Values ('Kopernika 24/1', 21);
INSERT INTO Pomieszczenie(Adres,Powierzchnia) Values ('Kopernika 24/2', 22);
INSERT INTO Pomieszczenie(Adres,Powierzchnia) Values ('Kopernika 24/3', 23);

INSERT INTO Szczegoly_klienta(Pesel_klienta,Adres,Wiek,Nr_telefonu,Miasto) Values ('94090606670', 'Kopernika 24/1',22,666555441,'Swidnica');
INSERT INTO Szczegoly_klienta(Pesel_klienta,Adres,Wiek,Nr_telefonu,Miasto) Values ('94090606671', 'Kopernika 24/2',22,666555442,'Wroclaw');
INSERT INTO Szczegoly_klienta(Pesel_klienta,Adres,Wiek,Nr_telefonu,Miasto) Values ('94090606672', 'Kopernika 24/3',22,666555443,'Walbrzych');
    


-- WIDOKI


CREATE VIEW Samochod_Widok AS SELECT * From Samochod;
CREATE VIEW Urzadzenia_Widok AS SELECT * From Urzadzenia;
CREATE VIEW Zlecenia_Widok AS SELECT * From Zlecenia;
CREATE VIEW Szczegoly_zlecenia_Widok AS SELECT * From Szczegoly_zlecenia;
CREATE VIEW Grupa_Widok AS SELECT * From Grupa;
CREATE VIEW Pracownicy_Widok AS SELECT * From Pracownicy;
CREATE VIEW Czynnosci_Widok AS SELECT * From Czynnosci;
CREATE VIEW Srodki_do_czyszczenia_Widok AS SELECT * From Srodki_do_czyszczenia;


-- USUNIECIE TABEL


DROP TABLE Pracownicy;
DROP TABLE szczegoly_zlecenia;
DROP TABLE zlecenia;
DROP TABLE czynnosci;
DROP TABLE GRUPA;
DROP TABLE Samochod;
DROP TABLE Srodki_do_czyszczenia;
DROP TABLE Urzadzenia;
DROP TABLE Szczegoly_klienta;
DROP TABLE Klient;
DROP TABLE Pomieszczenie;



-- USUNIĘCIE WIDOKÓW

DROP VIEW Samochod_Widok;
DROP VIEW Urzadzenia_Widok; 
DROP VIEW Zlecenia_Widok;
DROP VIEW Szczegoly_zlecenia_Widok;
DROP VIEW Grupa_Widok; 
DROP VIEW Pracownicy_Widok;
DROP VIEW Czynnosci_Widok;
DROP VIEW Srodki_do_czyszczenia_Widok;

