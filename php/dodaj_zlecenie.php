<?php      
    include "../forms.php";
    include '../connect.php';
    session_start();
    if(isset($_POST["pesel"]))
        {
            $pesel=$_POST["pesel"];
        
        };
    if(isset($_POST["data"]))
        {
            $data=$_POST["data"];
        };
    if(isset($_POST["zarobek"]) && $_POST["zarobek"]!=null)
        {
            $zarobek=$_POST["zarobek"];
        };
    if(isset($_POST["id_grupy"]))
        {
            $id_grupy=$_POST["id_grupy"];
        };
    if(isset($_POST["rodzaj_czynnosci"]))
        {
            $rodzaj_czynnosci=$_POST["rodzaj_czynnosci"];
        };
   if(isset($_POST["data_przyjecia"]))
        {
            $data_przyjecia=$_POST["data_przyjecia"];
        };
   if(isset($_POST["data_wykonania"]))
        {
            $data_wykonania=$_POST["data_wykonania"];
        };

    if (isset($_POST['check'])){
        $id_zlecenia=$_POST["id_zlecenia"];
        $sql5="INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia,Data_przyjecia,Data_wykonania,Kwota_dochodu)VALUES($id_grupy,'$rodzaj_czynnosci',$id_zlecenia,'$data_przyjecia','$data_wykonania','$zarobek');";
        if($conn->query($sql5) === TRUE){
            $_SESSION["ok"]="Nowy rekord dodany!";    
            header('Location: ../web.php');
        }
            else{
                
                $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!".$conn->error;   
                header('Location: ../web.php');
            }
            $conn->close();
            die();
                
    }

    
    
    $sql="INSERT INTO Zlecenia(Pesel_klienta) Values ($pesel)";
            
    if ($conn->query($sql) === TRUE) {
        
        $sql4 = "SELECT Id_zlecenia FROM Zlecenia ORDER BY Id_zlecenia DESC LIMIT 1;";
        $result = $conn->query($sql4);
        $row = $result->fetch_assoc();
        $id = $row['Id_zlecenia'];
        $sql2="DELETE FROM Zlecenia WHERE Id_zlecenia='$id'";
        $sql1="INSERT INTO Szczegoly_zlecenia(Id_grupy,Rodzaj_czynnosci,Id_zlecenia,Data_przyjecia,Data_wykonania,Kwota_dochodu)VALUES($id_grupy,'$rodzaj_czynnosci',$id,'$data_przyjecia','$data_wykonania','$zarobek')";
        
        
        if($conn->query($sql1) === TRUE){
            $_SESSION["ok"]="Nowy rekord dodany!";    
            header('Location: ../web.php');
        }else{
             $conn->query($sql2);
             $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!".$conn->error.$conn->query($sql2);    
             header('Location: ../web.php');
        }
    } else {
        
        $_SESSION["error"]="Błąd przy wprowadzaniu danych, spróbuj ponownie!".$conn->error.$conn->query($sql2);   
        header('Location: ../web.php');
    }

        $conn->close();
            
?>