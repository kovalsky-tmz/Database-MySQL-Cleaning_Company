<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();
    if(isset($_POST["adres"]))
        {
            $adres=$_POST["adres"];

        };
    if(isset($_POST["adres_edycja"]))
        {
            $adres_edycja=$_POST["adres_edycja"];
        };
    if(isset($_POST["powierzchnia"]))
        {
            $powierzchnia=$_POST["powierzchnia"];
        };


    $sql="UPDATE pomieszczenie
          SET Adres= '$adres_edycja',Powierzchnia='$powierzchnia' 
          WHERE Adres = '$adres';";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Edycja udana!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!".$conn->error;    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>