<?php
    include 'connect.php';

if(isset($_GET['wyszukaj']) && $_GET['wyszukaj']!=='') {
    $slowo=$_GET['wyszukaj'];
    
    $sql="SELECT *
            FROM pracownicy
            WHERE nazwisko LIKE '".$slowo."%'";

    $wynik = $conn->query($sql);

    if ($wynik->num_rows > 0) {
        echo "<table class='table table-bordered'><thead><tr><th>Id Pracownika</th><th>Nazwisko</th><th>Imie</th><th>Data Zatrudnienia</th><th>Id Grupy</th><th>Stanowisko</th><th>Zarobek Roczny</th></tr></thead><tbody>";
        while($row = $wynik->fetch_assoc()) {
             echo "<tr><td>".$row['Id_pracownika']."</td><td>".$row['Nazwisko']."</td><td>".$row['Imie']."</td><td>".$row['Data_zatrudnienia']."</td><td>".$row['Id_grupy']."</td><td>".$row['Stanowisko']."</td><td>".$row['Zarobek_roczny']."</td></tr>";

        }
    } else {
        echo "<center><b>0 results</b></center>";
    } 
    $conn->close();
};
  // $row["Id_pracownika"]. " - Imie i Nazwisko : " . $row["Imie"]. " " . $row["Nazwisko"]. "<br>"; 
    /*        for($i=0;$i<$wynik->num_rows;$i++){
                 echo "<tr><td>"$row['Id_pracownika']"</td><td>"$row['Nazwisko']"</td><td>"$row['Imie']"</td><td>"$row['Data_zatrudnienia']"</td><td>"$row['Id_grupy']"</td><td>"$row['Stanowisko']"</td><td>"$row['Zarobek_roczny']"</td></tr>";
            }; */
?>

