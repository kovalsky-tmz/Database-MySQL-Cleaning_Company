<?php
    include 'connect.php';

if(isset($_GET['wyszukaj_klient']) && $_GET['wyszukaj_klient']!=='') {
    $slowo=$_GET['wyszukaj_klient'];
    
    $sql="SELECT klient.*, szczegoly_klienta.*
         FROM klient 
         INNER JOIN szczegoly_klienta ON klient.pesel_klienta=szczegoly_klienta.pesel_klienta
         WHERE klient.pesel_klienta LIKE '".$slowo."%'";

    $wynik = $conn->query($sql);

    if ($wynik->num_rows > 0) {
        echo "<table class='table table-bordered'><thead><tr><th>Pesel Klienta</th><th>Imie</th><th>Nazwisko</th><th>Adres</th><th>Miasto</th><th>Telefon</th><th>Wiek</th></tr></thead><tbody>";
        while($row = $wynik->fetch_assoc()) {
             echo "<tr><td>".$row['Pesel_klienta']."</td><td>".$row['Imie']."</td><td>".$row['Nazwisko']."</td><td>".$row['Adres']."</td><td>".$row['Miasto']."</td><td>".$row['Nr_telefonu']."</td><td>".$row['Wiek']."</td></tr>";

        }
    } else {
        echo "<center><b>0 results</b></center>";
    } 
    $conn->close();
};

?>