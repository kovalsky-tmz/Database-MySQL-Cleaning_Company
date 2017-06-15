<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();

    if(isset($_POST["rejestracja"]))
        {
            $Nr_Rejestracji=$_POST["rejestracja"];

        };

    $sql="DELETE FROM samochod
          WHERE Nr_rejestracji='$Nr_Rejestracji';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Samochod usuniety!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>