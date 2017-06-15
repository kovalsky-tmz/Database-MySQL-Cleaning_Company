<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();

    if(isset($_POST["id_grupy"]))
        {
            $id_grupy=$_POST["id_grupy"];
        };

    $sql="DELETE FROM grupa
          WHERE id_grupy='$id_grupy';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Grupa usunieta!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>