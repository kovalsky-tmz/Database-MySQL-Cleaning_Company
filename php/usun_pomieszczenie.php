<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();

    if(isset($_POST["adres"]))
        {
            $adres=$_POST["adres"];
        };

    $sql="DELETE FROM pomieszczenie
          WHERE adres='$adres';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Pomieszczenie usunięte!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>