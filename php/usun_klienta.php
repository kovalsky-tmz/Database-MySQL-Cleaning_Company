<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();

    if(isset($_POST["pesel"]))
        {
            $pesel=$_POST["pesel"];

        };

    $sql="DELETE FROM klient
          WHERE Pesel_klienta='$pesel';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Klient usuniety!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>