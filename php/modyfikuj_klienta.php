<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();

    if(isset($_POST["pesel"]) && $_POST["pesel"]!=null)
        {
            $pesel=$_POST["pesel"];
        };
    if(isset($_POST["pesel_edycja"]))
        {
            $pesel_edycja=$_POST["pesel_edycja"];
        };
    if(isset($_POST["imie"]))
        {
            $imie=$_POST["imie"];
        };
    if(isset($_POST["nazwisko"]) && $_POST["nazwisko"]!=null)
        {
            $nazwisko=$_POST["nazwisko"];
        };
    if(isset($_POST["adres"]) && $_POST["adres"]!=null)
        {
            $adres=$_POST["adres"];
        };
    if(isset($_POST["adres_edycja"]) && $_POST["adres_edycja"]!=null)
        {
            $adres_edycja=$_POST["adres_edycja"];
        };
    if(isset($_POST["powierzchnia"]))
        {
            $powierzchnia=$_POST["powierzchnia"];
        };
    if(isset($_POST["wiek"]))
        {
            $wiek=$_POST["wiek"];
        };
    if(isset($_POST["telefon"]) && $_POST["telefon"]!=null)
        {
            $telefon=$_POST["telefon"];
        };
    if(isset($_POST["miasto"]) && $_POST["miasto"]!=null)
        {
            $miasto=$_POST["miasto"];
        };



    $sql="UPDATE klient
          SET Pesel_klienta = '$pesel_edycja', Imie='$imie',Nazwisko='$nazwisko'
          WHERE Pesel_klienta = '$pesel';";
    $sql2="UPDATE Szczegoly_klienta 
            SET Wiek='$wiek' , Nr_telefonu ='$telefon' , Miasto='$miasto' 
            WHERE Pesel_klienta='$pesel' AND Adres='$adres'";
    $sql3="UPDATE Pomieszczenie SET Adres='$adres_edycja', Powierzchnia='$powierzchnia' 
            WHERE Adres='$adres'";
            
    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
        $_SESSION["ok"]="Edycja udana!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!".$conn->error;    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>