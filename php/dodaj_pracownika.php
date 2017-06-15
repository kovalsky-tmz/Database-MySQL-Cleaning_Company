<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();
    if(isset($_POST["imie"]))
        {
            $imie=$_POST["imie"];
        };
    if(isset($_POST["nazwisko"]))
        {
            $nazwisko=$_POST["nazwisko"];
        };
    if(isset($_POST["data"]))
        {
            $data=$_POST["data"];
        };
    if(isset($_POST["id_gr"]))
        {
            $id_gr=$_POST["id_gr"];
        };
    if(isset($_POST["stanowisko"]))
        {
            $stanowisko=$_POST["stanowisko"];
        };
    if(isset($_POST["zarobek"]))
        {
            $zarobek=$_POST["zarobek"];
        };

    $sql="INSERT INTO Pracownicy(Imie,Nazwisko,Data_zatrudnienia,Id_grupy,Stanowisko,Zarobek_roczny) Values ('$imie','$nazwisko','$data','$id_gr','$stanowisko','$zarobek');";
    $sql2="UPDATE Grupa SET Ilosc_osob=(SELECT COUNT(*) FROM Pracownicy GROUP BY Id_grupy HAVING Id_grupy='$id_gr') WHERE Id_grupy='$id_gr';";   
    if ($conn->query($sql) === TRUE) {
        $conn->query($sql2);
        $_SESSION["ok"]="Nowy rekord dodany!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>