<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();

    if(isset($_POST["id_pracownika"]))
        {
            $id_pracownika=$_POST["id_pracownika"];
        };

    $sql="DELETE FROM Pracownicy
          WHERE id_pracownika='$id_pracownika';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Pracownik usuniety!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>