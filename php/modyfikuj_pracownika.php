<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();

    if(isset($_POST["id_pracownika"]))
        {
            $id_pracownika=$_POST["id_pracownika"];
        };
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

    $sql="UPDATE Pracownicy
          SET Nazwisko = '$nazwisko', Imie= '$imie',Data_zatrudnienia='$data', Id_grupy='$id_gr',Stanowisko='$stanowisko',Zarobek_roczny='$zarobek'
          WHERE id_pracownika = '$id_pracownika';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Edycja udana!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>