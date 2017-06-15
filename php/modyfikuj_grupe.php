<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();
    if(isset($_POST["id_grupy"]))
        {
            $id_grupy=$_POST["id_grupy"];
        };
    if(isset($_POST["Nr_Rejestracji"]))
        {
            $Nr_Rejestracji=$_POST["Nr_Rejestracji"];
        };



        $sql="UPDATE Grupa
          SET Nr_Rejestracji = '$Nr_Rejestracji'
          WHERE id_grupy = '$id_grupy';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Edycja udana!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>