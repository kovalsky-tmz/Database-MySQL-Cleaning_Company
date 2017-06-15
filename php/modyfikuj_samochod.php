<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();
    if(isset($_POST["rejestracja"]))
        {
            $Nr_Rejestracji=$_POST["rejestracja"];

        };
    if(isset($_POST["marka"]))
        {
            $marka=$_POST["marka"];
        };
    if(isset($_POST["model"]))
        {
            $Model_Auta=$_POST["model"];
        };
    if(isset($_POST["rok"]))
        {
            $Rok_Produkcji=$_POST["rok"];
        };


    $sql="UPDATE Samochod
          SET Marka= '$marka',Model_auta='$Model_Auta', Rok_produkcji='$Rok_Produkcji'
          WHERE Nr_rejestracji = '$Nr_Rejestracji';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Edycja udana!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>