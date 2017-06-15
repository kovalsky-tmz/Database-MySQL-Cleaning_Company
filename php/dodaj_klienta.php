<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();
    if(isset($_POST["pesel"]))
        {
            $pesel=$_POST["pesel"];
        };
    if(isset($_POST["imie"]))
        {
            $imie=$_POST["imie"];
        };
    if(isset($_POST["nazwisko"]))
        {
            $nazwisko=$_POST["nazwisko"];
        };
    if(isset($_POST["wiek"]))
        {
            $wiek=$_POST["wiek"];
        };
    if(isset($_POST["tel"]))
        {
            $tel=$_POST["tel"];
        };
    if(isset($_POST["miasto"]))
        {
            $miasto=$_POST["miasto"];
        };
    if(isset($_POST["adres"]))
        {
            $adres=$_POST["adres"];
        };
    if(isset($_POST["pow"]))
        {
            $pow=$_POST["pow"];
        };

    if (isset($_POST['check'])){
        $sql3="INSERT INTO Szczegoly_klienta(Pesel_klienta,Adres,Wiek,Nr_telefonu,Miasto) VALUES ($pesel,'$adres','$wiek','$tel','$miasto')";
        if ($conn->query($sql3) === TRUE) {
            $_SESSION["ok"]="Nowy rekord dodany!";    
            header('Location: ../web.php');
        } else {
            $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!".$conn->error;   
            header('Location: ../web.php');
        }
        $conn->close();
        die();
    };

    $sql="INSERT INTO Klient(Pesel_klienta,Imie,Nazwisko) Values ('$pesel','$imie','$nazwisko');";

    $sql2="INSERT INTO Pomieszczenie(Adres,Powierzchnia) Values ('$adres','$pow');";    

    $sql1="INSERT INTO Szczegoly_klienta(Pesel_klienta,Adres,Wiek,Nr_telefonu,Miasto) Values ('$pesel','$adres','$wiek','$tel','$miasto');";
    
    
            
    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql1) === TRUE) {
        $_SESSION["ok"]="Nowy rekord dodany!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";  
        header('Location: ../web.php');

    }

        $conn->close();
            
?>