<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();

    if(isset($_POST["id_zlecenia"]))
        {
            $id_zlecenia=$_POST["id_zlecenia"];
        };


    $sql="DELETE FROM zlecenia
          WHERE id_zlecenia='$id_zlecenia';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Zlecenie usuniete!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>