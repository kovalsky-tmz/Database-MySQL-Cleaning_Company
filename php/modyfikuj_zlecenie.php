<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();

    if(isset($_POST["id_zlecenia"]))
        {
            $id_zlecenia=$_POST["id_zlecenia"];
        };
    if(isset($_POST["pesel"]))
        {
            $pesel=$_POST["pesel"];
        };
    if(isset($_POST["data_przyjecia"]))
        {
            $data_przyjecia=$_POST["data_przyjecia"];
        };
    if(isset($_POST["czynnosc"]))
        {
            $czynnosc=$_POST["czynnosc"];
        };
    if(isset($_POST["data_zakonczenia"]))
        {
            $data_zakonczenia=$_POST["data_zakonczenia"];
        };
    if(isset($_POST["id_grupy"]))
        {
            $id_grupy=$_POST["id_grupy"];
        };
    if(isset($_POST["zarobek"]))
        {
            $zarobek=$_POST["zarobek"];
        };
    if(isset($_POST["id_grupy_edycja"]))
        {
            $id_grupy_edycja=$_POST["id_grupy_edycja"];
        };
    if(isset($_POST["czynnosc_edycja"]))
        {
            $czynnosc_edycja=$_POST["czynnosc_edycja"];
        };

    $sql="UPDATE Zlecenia
          SET Pesel_klienta='$pesel'
          WHERE id_zlecenia = '$id_zlecenia';";
    $sql2="UPDATE Szczegoly_zlecenia SET Id_grupy='$id_grupy_edycja',Rodzaj_czynnosci='$czynnosc_edycja',Data_wykonania='$data_zakonczenia', Data_przyjecia='$data_przyjecia',Kwota_dochodu='$zarobek' WHERE Id_grupy='$id_grupy' AND Id_zlecenia='$id_zlecenia' AND Rodzaj_czynnosci='$czynnosc'";
            
    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
        $_SESSION["ok"]="Edycja udana!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!".$conn->error;    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>