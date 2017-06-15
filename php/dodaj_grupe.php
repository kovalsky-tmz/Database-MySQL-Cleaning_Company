<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();
    if(isset($_POST["Nr_Rejestracji"]))
        {
            $Nr_Rejestracji=$_POST["Nr_Rejestracji"];
        };


    $sql="INSERT INTO Grupa(Nr_Rejestracji) Values ('$Nr_Rejestracji');";
    
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Nowy rekord dodany!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!<br/>".$conn->error;    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>