<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php

    include 'connect.php';
    
    if(isset($_GET['przycisk']) && $_GET['przycisk']=="dodaj_zlecenie")
    {
        print 
            "<center><br/><strong>Dodaj zlecenie<strong><br/>
            <form action='php/dodaj_zlecenie.php' method='post'>
            <label>Dołączanie</label><input type='checkbox' name='check' value='Tak'/><br/><br/>
            <label>PESEL:</label><input type='text' name='pesel' placeholder='11 cyfr' pattern='[0-9]{11}' required/><br/>
            <label>*Zarobek:</label><input type='text' pattern='[0-9]*' name='zarobek'/><br/>
            <label>Dołącz do Grupy(ID):</label><input type='text'  name='id_grupy' pattern='\d*' required/><br/>
            <label>Dołącz do czynności:</label><input type='text'  name='rodzaj_czynnosci' required/><br/>
            <label>Data przyjęcia zlecenia:</label><input type='text'  name='data_przyjecia' placeholder='RR/MM/DD' pattern='[0-9]{2}[/ /.][0-9]{2}[/ /.][0-9]{2}' required /><br/>
            <label>Data na wykonanie:</label><input type='text'  name='data_wykonania' placeholder='RR/MM/DD' pattern='[0-9]{2}[/ /.][0-9]{2}[/ /.][0-9]{2}' required/><br/>
            <label>ID zlecenia(<span style='color:red'>OPCJA DOŁĄCZANIA</span>):</label><input type='text'  name='id_zlecenia' pattern='\d*'/><br/>
            <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
  
        $conn->close();
    };

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="dodaj_czynnosc")
    {
        print 
            "<center><br/><strong>Dodaj Czynność<strong><br/><br/>
            <form action='php/dodaj_czynnosc.php' method='post'>
            <label>Nazwa Czynności:</label><input type='text' name='czynnosc' required/><br/>
            <label>*Nazwa Środka:</label><input type='text' name='nazwa_sr' /><br/>
            <label>*Cena Środka:</label><input type='text' name='cena_sr' pattern='\d*'/><br/>
            <label>*Nazwa Urządzenia:</label><input type='text' name='nazwa_urz'/><br/>
            <label>*Cena Urządzenia:</label><input type='text' name='cena_urz' pattern='\d*'/><br/>
            
            
            <br/>
            <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
  
        $conn->close();
    };


    if(isset($_GET['przycisk']) && $_GET['przycisk']=="dodaj_pracownika"){
        print 
            "<center><br/><strong>Dodaj pracownika<strong><br/><br/><form action='php/dodaj_pracownika.php' method='post'>
            <label>*Imie:</label><input type='text' name='imie' pattern='[a-zA-Z]*'/><br/>
            <label>Nazwisko:</label><input type='text' name='nazwisko' pattern='[a-zA-Z]*' required/><br/>
            <label>*Data zatrudnienia:</label><input type='text' name='data' placeholder='RR/MM/DD' pattern='[0-9]{2}[/ /.][0-9]{2}[/ /.][0-9]{2}' /><br/>
            <label>Id Grupy:</label><input type='text' name='id_gr' pattern='\d*' required /><br/>
            <label>Stanowisko:</label><input type='text' name='stanowisko' pattern='[a-zA-Z]*' required/><br/>
            <label>*Zarobek Roczny:</label><input type='text' name='zarobek' pattern='\d*' /><br/>
            <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";  
        $conn->close();    
        };


     if(isset($_GET['przycisk']) && $_GET['przycisk']=="dodaj_grupe"){
            print 
                "<center><br/><strong>Dodaj grupe<strong><br/><br/><form action='php/dodaj_grupe.php' method='post'>
                <label>Samochod(nr.Rejestracyjny):</label><input type='text' name='Nr_Rejestracji' required /><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
        };
  

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="dodaj_samochod"){
            print 
                "<center><br/><strong>Dodaj samochod<strong><br/><br/><form action='php/dodaj_samochod.php' method='post'>
                <label>Numer Rejestracyjny:</label><input type='text' name='rejestracja' placeholder='Maks. 8 znaków' required/><br/>
                <label>*Marka:</label><input type='text' name='marka' /><br/>
                <label>*Model:</label><input type='text' name='model' /><br/>
                <label>*Rok Produkcji:</label><input type='text' name='rok' pattern='\d*' /><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
        };

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="dodaj_klienta"){
            print 
                "<center><br/><strong>Dodaj Klienta</strong><form action='php/dodaj_klienta.php' method='post'>
                <label>Dołączanie</label><input type='checkbox' name='check' value='Tak'/><br/><br/>
                <label>Pesel:</label><input type='text' name='pesel' placeholder='11 cyfr' pattern='[0-9]{11}' required/><br/>
                <label>*Imie:</label><input type='text' name='imie' /><br/>
                <label>Nazwisko:</label><input type='text' name='nazwisko' required/><br/>
                <label>*Wiek:</label><input type='text' name='wiek'' /><br/>
                <label>Nr. Telefonu:</label><input type='text' name='tel' required/><br/>
                <label>Miasto:</label><input type='text' name='miasto' required/><br/>
                <label>Adres:</label><input type='text' name='adres' required/><br/>
                <label>Powierzchnia obiektu m2:</label><input type='text' name='pow' pattern='\d*' required/><br/>
                
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
        };

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="dodaj_pomieszczenie"){
        print 
            "<center><br/><strong>Dodaj pomieszczenie<strong><br/><br/><form action='php/dodaj_pomieszczenie.php' method='post'>
            <label>Podaj Adres:</label><input type='text' name='adres' required/><br/>
            <label>Podaj powierzchnie:</label><input type='text' name='powierzchnia' pattern='\d*' required/><br/>
            <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
        };


    if(isset($_GET['przycisk']) && $_GET['przycisk']=="modyfikuj_zlecenie"){
            print 
                "<center><br/><strong>Modyfikuj zlecenie<strong><br/><br/><form action='php/modyfikuj_zlecenie.php' method='post'>
                <label>Wybierz Id Zlecenia:</label><input type='text' name='id_zlecenia' pattern='\d*' required/><br/>
                <label>Wybierz Id Grupy:</label><input type='text' name='id_grupy' pattern='\d*' required/><br/>
                <label>Wybierz Czynność:</label><input type='text' name='czynnosc' required/><br/>
                <label>Edytuj Pesel Klienta:</label><input type='text' name='pesel' placeholder='11 cyfr' pattern='[0-9]{11}' /><br/>
                <label>Edytuj Data przyjęcia zlecenia:</label><input type='text' name='data_przyjecia' placeholder='RR/MM/DD' pattern='[0-9]{2}[/ /.][0-9]{2}[/ /.][0-9]{2}'/><br/>
                <label>Edytuj Data zakończenia:</label><input type='text' name='data_zakonczenia' placeholder='RR/MM/DD' pattern='[0-9]{2}[/ /.][0-9]{2}[/ /.][0-9]{2}'/><br/>
                <label>Edytuj Id grupy :</label><input type='text' name='id_grupy_edycja' pattern='\d*' /><br/>
                <label>Edytuj Czynność :</label><input type='text' name='czynnosc_edycja' /><br/>
                <label>Edytuj Zarobek:</label><input type='text' name='zarobek' pattern='\d*'/><br/><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
        };
    
    if(isset($_GET['przycisk']) && $_GET['przycisk']=="modyfikuj_klienta"){
            print 
                "<center><br/><strong>Modyfikuj klienta<strong><br/><br/><form action='php/modyfikuj_klienta.php' method='post'>
                <label>Podaj pesel klienta:</label><input type='text' name='pesel' placeholder='11 cyfr' pattern='[0-9]{11}' required/><br/>
                <label>Podaj Adres klienta:</label><input type='text' name='adres' required /><br/>
                <label>Edytuj Pesel:</label><input type='text' name='pesel_edycja'  /><br/>
                <label>Edytuj Imie:</label><input type='text' name='imie'  /><br/>
                <label>Edytuj Nazwisko:</label><input type='text' name='nazwisko' /><br/>
                <label>Edytuj Adres:</label><input type='text' name='adres_edycja' /><br/>
                <label>Edytuj Powierzchnie:</label><input type='text' name='powierzchnia'/><br/>
                <label>Edytuj Wiek:</label><input type='text' name='wiek' /><br/>
                <label>Edytuj Numer Telefonu:</label><input type='text' name='telefon'/><br/>
                <label>Edytuj Miasto:</label><input type='text' name='miasto' /><br/><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
        };

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="modyfikuj_pracownika"){
            print 
                "<center><br/><strong>Modyfikuj pracownika<strong><br/><br/><form action='php/modyfikuj_pracownika.php' method='post'>
                <label>Wybierz Id Pracownika:</label><input type='text' name='id_pracownika'pattern='\d*' required/><br/>
                <label>Imie:</label><input type='text' name='imie' pattern='[a-zA-Z]*'/><br/>
                <label>Nazwisko:</label><input type='text' name='nazwisko'pattern='[a-zA-Z]*' /><br/>
                <label>Data zatrudnienia:</label><input type='text' name='data' placeholder='RR/MM/DD' pattern='[0-9]{2}[/ /.][0-9]{2}[/ /.][0-9]{2}'/><br/>
                <label>Id Grupy:</label><input type='text' name='id_gr' pattern='\d*' /><br/>
                <label>Stanowisko:</label><input type='text' name='stanowisko' pattern='[a-zA-Z]*'/><br/>
                <label>Zarobek Roczny:</label><input type='text' name='zarobek' pattern='\d*' /><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
 
        };

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="modyfikuj_grupe"){
        print 
            "<center><br/><strong>Modyfikuj grupe<strong><br/><br/><form action='php/dodaj_grupe.php' method='post'>
            <label>Podaj Id Grupy:</label><input type='text' name='id_grupy' pattern='\d*' required/><br/>
            <label>Samochod(nr.Rejestracyjny):</label><input type='text' name='Nr_Rejestracji' /><br/>
           
            <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
        };
        if(isset($_GET['przycisk']) && $_GET['przycisk']=="modyfikuj_pomieszczenie"){
        print 
            "<center><br/><strong>Modyfikuj pomieszczenie<strong><br/><br/><form action='php/modyfikuj_pomieszczenie.php' method='post'>
            <label>Podaj Adres:</label><input type='text' name='adres' required/><br/>
            <label>Edytuj Adres:</label><input type='text' name='adres_edycja' /><br/>
            <label>Podaj powierzchnie:</label><input type='text' name='powierzchnia' pattern='\d*'/><br/>
            <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
        };


    if(isset($_GET['przycisk']) && $_GET['przycisk']=="modyfikuj_samochod"){
        print 
            "<center><br/><strong>Modyfikuj samochod<strong><br/><br/><form action='php/modyfikuj_samochod.php' method='post'>
            <label>Numer Rejestracyjny:</label><input type='text' name='rejestracja' required/><br/>
            <label>Marka:</label><input type='text' name='marka' /><br/>
            <label>Model:</label><input type='text' name='model' /><br/>
            <label>Rok Produkcji:</label><input type='text' name='rok' pattern='\d*'/><br/>
            <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
        };

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="usun_zlecenie"){
            print 
                "<center><br/><strong>Usun zlecenie<strong><br/><br/><form action='php/usun_zlecenie.php' method='post'>
                <label>Wybierz Id Zlecenia:</label><input type='text' name='id_zlecenia' pattern='\d*' required/><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";

        };
        if(isset($_GET['przycisk']) && $_GET['przycisk']=="usun_pomieszczenie"){
            print 
                "<center><br/><strong>Usun pomieszczenie<strong><br/><br/><form action='php/usun_pomieszczenie.php' method='post'>
                <label>Wybierz Adres pomieszczenia:</label><input type='text' name='adres' required/><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";

        };

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="usun_pracownika"){
            print 
                "<center><br/><strong>Usun pracownika<strong><br/><br/><form action='php/usun_pracownika.php' method='post'>
                <label>Wybierz Id Pracownika:</label><input type='text' name='id_pracownika' pattern='\d*' required/><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
 
        };

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="usun_grupe"){
            print 
                "<center><br/><strong>Usun grupe<strong><br/><br/><form action='php/usun_grupe.php' method='post'>
                <label>Wybierz Id Grupy:</label><input type='text' name='id_grupy' pattern='\d*' required/><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";

        };
    
    if(isset($_GET['przycisk']) && $_GET['przycisk']=="usun_samochod"){
            print 
                "<center><br/><strong>Usun samochod<strong><br/><br/><form action='php/usun_samochod.php' method='post'>
                <label>Wybierz Numer rejestacyjny samochodu:</label><input type='text' name='rejestracja' required/><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
       
        };
    if(isset($_GET['przycisk']) && $_GET['przycisk']=="usun_klienta"){
            print 
                "<center><br/><strong>Usun klienta<strong><br/><br/><form action='php/usun_klienta.php' method='post'>
                <label>Podaj numer Pesel:</label><input type='text' name='pesel' placeholder='11 cyfr' pattern='[0-9]{11}' required/><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
       
        };

   if(isset($_GET['przycisk']) && $_GET['przycisk']=="usun_czynnosc"){
            print 
                "<center><br/><strong>Usun czynność<strong><br/><br/><form action='php/usun_czynnosc.php' method='post'>
                <label>Podaj nazwę czynności:</label><input type='text' name='nazwa_czynnosci' required/><br/>
                <input type='submit' class='btn btn-success' value='zatwierdź' name='submit'>";
       
        };

    if(isset($_GET['przycisk']) && $_GET['przycisk']=="wyswietl_zlecenie"){
        $sql="SELECT Zlecenia.*, Szczegoly_zlecenia.*
              FROM Zlecenia
              INNER JOIN Szczegoly_zlecenia ON Zlecenia.Id_zlecenia=Szczegoly_zlecenia.Id_zlecenia
              ORDER BY Zlecenia.Id_zlecenia ;";
        $wynik = $conn->query($sql);
        if($wynik->num_rows>0){
            echo "<br/><br/><br/>
            <table class='table table-bordered'><thead><tr><th>Id Zlecenia</th><th>Pesel klienta</th><th>Kwota dochodu</th><th>Id Grupy</th><th>Rodzaj czynnosci</th><th>Data Zlecenia </th><th>Data na wykonanie</th></tr></thead><tbody>";
            while($row = $wynik->fetch_assoc()) {
                 echo "<tr><td>".$row['Id_zlecenia']."</td>
                 <td>".$row['Pesel_klienta']."</td>
                 <td>".$row['Kwota_dochodu']."</td>
                 <td>".$row['Id_grupy']."</td>
                 <td>".$row['Rodzaj_czynnosci']."</td>
                 <td>".$row['Data_przyjecia']."</td>
                 <td>".$row['Data_wykonania']."</td>
                 </tr>";
            }
        } else {
            echo "<center><b>0 results</b></center>";
        }         
    };
    
   if(isset($_GET['przycisk']) && $_GET['przycisk']=="wyswietl_pracownikow"){
        $sql="SELECT * FROM Pracownicy";
        $wynik = $conn->query($sql);
        if($wynik->num_rows>0){
            echo "<br/><br/><br/>
            <table class='table table-bordered'><thead><tr><th>Id Pracownika</th><th>Imie</th><th>Nazwisko</th><th>Data Zatrudnienia</th><th>Id Grupy</th><th>Stanowisko</th><th>Zarobek Roczny</th></tr></thead><tbody>";
            while($row = $wynik->fetch_assoc()) {
                 echo "<tr><td>".$row['Id_pracownika']."</td>
                 <td>".$row['Imie']."</td>
                 <td>".$row['Nazwisko']."</td>
                 <td>".$row['Data_zatrudnienia']."</td>
                 <td>".$row['Id_grupy']."</td>
                 <td>".$row['Stanowisko']."</td>
                 <td>".$row['Zarobek_roczny']."</td>
                 </tr>";
            }
        } else {
            echo "<center><b>0 results</b></center>";
        }     
   };
   if(isset($_GET['przycisk']) && $_GET['przycisk']=="wyswietl_grupy"){
        $sql="SELECT Grupa.*,Samochod.Marka,Samochod.Model_auta
              FROM Grupa
              INNER JOIN Samochod ON Grupa.Nr_Rejestracji=Samochod.Nr_Rejestracji;";
        $wynik = $conn->query($sql);
        if($wynik->num_rows>0){
            echo "<br/><br/><br/>
            <table class='table table-bordered'><thead><tr><th>Id Grupy</th><th>Nr Rejestracji dla samochodu</th><th>Ilosc osob</th><th>Marka</th><th>Model</th></tr></thead><tbody>";
            while($row = $wynik->fetch_assoc()) {
                 echo "<tr>
                 <td>".$row['Id_grupy']."</td>
                 <td>".$row['Nr_Rejestracji']."</td>
                 <td>".$row['Ilosc_osob']."</td>
                 <td>".$row['Marka']."</td>
                 <td>".$row['Model_auta']."</td>
                 </tr>";
            }
        } else {
            echo "<center><b>0 results</b></center>";
        }
   };
   if(isset($_GET['przycisk']) && $_GET['przycisk']=="wyswietl_samochody"){
        $sql="SELECT * FROM Samochod";
        $wynik = $conn->query($sql);
        if($wynik->num_rows>0){
            echo "<br/><br/><br/>
            <table class='table table-bordered'><thead><tr><th>Nr Rejestracji</th><th>Marka</th><th>Model</th><th>Rok Produkcji</th></tr></thead><tbody>";
            while($row = $wynik->fetch_assoc()) {
                 echo "<tr><td>".$row['Nr_rejestracji']."</td>
                 <td>".$row['Marka']."</td>
                 <td>".$row['Model_auta']."</td>
                 <td>".$row['Rok_produkcji']."</td>
                 </tr>";
            }
        } else {
            echo "<center><b>0 results</b></center>";
        }
   };
    if(isset($_GET['przycisk']) && $_GET['przycisk']=="wyswietl_pomieszczenia"){
        $sql="SELECT * FROM Pomieszczenie";
        $wynik = $conn->query($sql);
        if($wynik->num_rows>0){
            echo "<br/><br/><br/>
            <table class='table table-bordered'><thead><tr><th>Adres</th><th>Powierzchnia(m2)</th></tr></thead><tbody>";
            while($row = $wynik->fetch_assoc()) {
                 echo "<tr><td>".$row['Adres']."</td>
                 <td>".$row['Powierzchnia']."</td>
                 </tr>";
            }
        } else {
            echo "<center><b>0 results</b></center>";
        }
   };
   if(isset($_GET['przycisk']) && $_GET['przycisk']=="wyswietl_klienta"){
        $sql="SELECT szczegoly_klienta.*, klient.Imie, klient.Nazwisko, pomieszczenie.Powierzchnia
        FROM szczegoly_klienta
        INNER JOIN klient ON szczegoly_klienta.Pesel_klienta=klient.Pesel_klienta
        INNER JOIN pomieszczenie ON szczegoly_klienta.adres=pomieszczenie.adres;
        ";
        $wynik = $conn->query($sql);
        if($wynik->num_rows>0){
            echo "<br/><br/><br/>
            <table class='table table-bordered'><thead><tr><th>Pesel</th><th>Imie</th><th>Nazwisko</th><th>Adres</th><th>Wiek</th><th>Nr Telefonu</th><th>Miasto</th><th>Powierzchnia obiektu</th></tr></thead><tbody>";
            while($row = $wynik->fetch_assoc()) {
                 echo "<tr><td>".$row['Pesel_klienta']."</td>
                 <td>".$row['Imie']."</td>
                 <td>".$row['Nazwisko']."</td>
                 <td>".$row['Adres']."</td>
                 <td>".$row['Wiek']."</td>
                 <td>".$row['Nr_telefonu']."</td>
                 <td>".$row['Miasto']."</td>
                 <td>".$row['Powierzchnia']."</td>
                 </tr>";
            }
        } else {
            echo "<center><b>0 results</b></center>";
        }
       
   };
   if(isset($_GET['przycisk']) && $_GET['przycisk']=="wyswietl_sprzet"){
        $sql="SELECT czynnosci.*, urzadzenia.Nazwa_urz, urzadzenia.Cena as cenaurz, srodki_do_czyszczenia.Nazwa_srodka,srodki_do_czyszczenia.Cena as cenasr
        FROM czynnosci
        LEFT JOIN urzadzenia ON czynnosci.Id_urz=urzadzenia.Id_urz
        INNER JOIN srodki_do_czyszczenia ON czynnosci.Id_srodka=srodki_do_czyszczenia.Id_srodka;
        ";
        $wynik = $conn->query($sql);
        if($wynik->num_rows>0){
            echo "<br/><br/><br/>
            <table class='table table-bordered'><thead><tr><th>Rodzaj_czynnosci</th><th>Id Urzadzenia</th><th>Nazwa Urzadzenia</th><th>Cena Urzadzenia</th><th>Id Środka Czyszczącego</th><th>Nazwa Środka Czyszczącego</th><th>Cena Środka Czyszczącego</th></tr></thead><tbody>";
            while($row = $wynik->fetch_assoc()) {
                 echo "<tr><td>".$row['Rodzaj_czynnosci']."</td>
                 <td>".$row['Id_urz']."</td>
                 <td>".$row['Nazwa_urz']."</td>
                 <td>".$row['cenaurz']."</td>
                 <td>".$row['Id_srodka']."</td>
                 <td>".$row['Nazwa_srodka']."</td>
                 <td>".$row['cenasr']."</td>
                 </tr>";
            }
        } else {
            echo "<center><b>0 results</b></center>";
        }
   };
?>
    </body>
</html>