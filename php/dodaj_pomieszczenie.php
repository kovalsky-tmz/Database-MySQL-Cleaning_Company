<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();
    if(isset($_POST["adres"]))
        {
            $adres=$_POST["adres"];
        };
    if(isset($_POST["powierzchnia"]))
        {
            $powierzchnia=$_POST["powierzchnia"];
        };


    $sql="INSERT INTO Pomieszczenie(Adres,Powierzchnia) Values ('$adres','$powierzchnia');";
            
    if ($conn->query($sql) === TRUE) {
        $_SESSION["ok"]="Nowy rekord dodany!";    
        header('Location: ../web.php');
    } else {
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!";    
        header('Location: ../web.php');
    }

        $conn->close();
            
?>