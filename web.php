<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="margin-top:50px" onload="form()" >
    <center>
        <button type="button" class="btn btn-primary" value="wyswietl_zlecenie">Wyświetl Zlecenia</button>
        <button type="button" class="btn btn-primary" value="wyswietl_pracownikow">Wyświetl Pracowników</button>
        <button type="button" class="btn btn-primary" value="wyswietl_grupy">Wyświetl Grupy</button>
        <button type="button" class="btn btn-primary" value="wyswietl_pomieszczenia">Wyświetl Pomieszczenia</button>
        <br/>
        <button type="button" class="btn btn-primary" value="wyswietl_samochody">Wyświetl Samochody</button>
        
        <button type="button" class="btn btn-primary" value="wyswietl_klienta">Wyświetl Klienta</button>
        <button type="button" class="btn btn-primary" value="wyswietl_sprzet">Wyświetl Sprzęt/Czynność</button>

    </center>
    <br/><br/>
    <center>
        <div class="well well-lg">
            <button type="button" class="btn btn-primary" value="dodaj_zlecenie">Dodaj Zlecenie</button>
            <button type="button" class="btn btn-primary" value="dodaj_pracownika">Dodaj Pracownika</button>
            <button type="button" class="btn btn-primary" value="dodaj_grupe">Dodaj Grupe</button>
            <br/>
            <button type="button" class="btn btn-primary" value="dodaj_pomieszczenie">Dodaj Pomieszczenie</button>
            <button type="button" class="btn btn-primary" value="dodaj_samochod">Dodaj Samochód</button>
      
            <button type="button" class="btn btn-primary" value="dodaj_klienta">Dodaj Klienta</button>
           
            
            <br/><br/>
            <button type="button" class="btn btn-success" value="modyfikuj_zlecenie">Modyfikuj Zlecenie</button>
            <button type="button" class="btn btn-success" value="modyfikuj_pracownika">Modyfikuj Pracownika</button>
            <button type="button" class="btn btn-success" value="modyfikuj_grupe">Modyfikuj Grupe</button>
            <br/>
             <button type="button" class="btn btn-success" value="modyfikuj_pomieszczenie">Modyfikuj Pomieszczenie</button>
            <button type="button" class="btn btn-success" value="modyfikuj_samochod">Modyfikuj Samochód</button>
            
           
            <button type="button" class="btn btn-success" value="modyfikuj_klienta">Modyfikuj Klienta</button>
            <br/><br/>
            <button type="button" class="btn btn-danger" value="usun_zlecenie">Usun Zlecenie</button>
            <button type="button" class="btn btn-danger" value="usun_pracownika">Usun Pracownika</button>
            <button type="button" class="btn btn-danger" value="usun_grupe">Usun Grupe</button>
            <br/>
            <button type="button" class="btn btn-danger" value="usun_pomieszczenie">Usun Pomieszczenie</button>
            <button type="button" class="btn btn-danger" value="usun_samochod">Usun Samochód</button>
  
            <button type="button" class="btn btn-danger" value="usun_klienta">Usun Klienta</button>
            
            <br/><br/>
        </div>
    </center>
    <br/>
    <div class="container" style="width:600px">
    <p/><span class="glyphicon glyphicon-search"></span> Wyszukaj pracownika po nazwisku:<input type="text" class="form-control" id="wyszukaj" name="wyszukaj" onkeyup="wyszukaj()"/>
        
    <div id="wyszukanie" name="wyszukanie" style="margin-left:-20%; width:800px">
        
    </div>
    <p/><span class="glyphicon glyphicon-search"></span> Wyszukaj klienta po numerze pesel:<input type="text" class="form-control" id="wyszukaj_klient" name="wyszukaj_klient" onkeyup="wyszukaj_klient()"/>
        
    <div id="wyszukanie_klient" name="wyszukanie_klient" style="margin-left:-24%; width:800px">
    </div>
    </div>
    
    
    
    <br/>
    <p id="wartosc" style="display:none"></p>
    
    <?php
        if(isset($_SESSION["error"])){
            echo "<center><p class='alert alert-danger' style='width:600px'><strong>".$_SESSION["error"]."</p></strong></center>"; 
            session_destroy();
        };
        if(isset($_SESSION["ok"])){
            echo "<center><p class='alert alert-success' style='width:600px'><strong>".$_SESSION["ok"]."</p></strong></center>"; 
            session_destroy();
        };
    ?>
    
    <div id="calosc" style="margin:auto; width:700px"></div>
    <div id="calosc1" style="margin:auto; width:700px"></div>


</body>    
</head>   
</html>
  







    <script type="text/javascript">
        // AJAX buttony
        btn=document.getElementsByTagName("button");
        for(var i=0;i<btn.length;i++){
            btn[i].addEventListener('click',function(){
                var id=this.value;
                document.getElementById("wartosc").innerHTML=id;
                form();
        })};
    </script>
    



    

    <script type="text/javascript">
    //AJAX wyświetlanie tabel
    function form(){
        if (typeof XMLHttpRequest == "undefined") {
            XMLHttpRequest = function() {
                return new ActiveXObject(
                    navigator.userAgent.indexOf("MSIE 5") >=0 ? "Microsoft.XMLHTTP" : "Msxml2.XMLHTTP"
                );
            }
        }
        var xml = new XMLHttpRequest();
        xml.open("GET",'forms.php?przycisk='+document.getElementById("wartosc").innerHTML, true);
        a=document.getElementById("wartosc").innerHTML;
        xml.onreadystatechange = function(){
            if ( xml.readyState == 4  && xml.status == 200) {
                if(a=="wyswietl_zlecenie" || a=="wyswietl_pracownikow" || a=="wyswietl_grupy" || a=="wyswietl_samochody" ||     a=="wyswietl_klienta" || a=="wyswietl_sprzet" || a=="wyswietl_pomieszczenia"){
                    document.getElementById("calosc1").innerHTML=xml.responseText;
                    document.getElementById('calosc1').scrollIntoView();
                }
                else{
                    document.getElementById("calosc").innerHTML=xml.responseText;
                    document.getElementById('calosc').scrollIntoView(false);
                }
            }
        };
        xml.send();
    }
          
        
        // wyszukaj pracownika
        
    function wyszukaj(){
        if (typeof XMLHttpRequest == "undefined") {
            XMLHttpRequest = function() {
                return new ActiveXObject(
                    navigator.userAgent.indexOf("MSIE 5") >=0 ? "Microsoft.XMLHTTP" : "Msxml2.XMLHTTP"
                );
            }
        }
        var xml = new XMLHttpRequest();
        xml.open("GET",'wyszukaj.php?wyszukaj='+document.getElementById('wyszukaj').value, true);
        
        xml.onreadystatechange = function(){
        if ( xml.readyState == 4  && xml.status == 200) {
            document.getElementById("wyszukanie").innerHTML=xml.responseText;
            }
        };
        xml.send();
    };
        
        
        
        
        // wyszukaj klienta
    function wyszukaj_klient(){
        if (typeof XMLHttpRequest == "undefined") {
            XMLHttpRequest = function() {
                return new ActiveXObject(
                    navigator.userAgent.indexOf("MSIE 5") >=0 ? "Microsoft.XMLHTTP" : "Msxml2.XMLHTTP"
                );
            }
        }
        var xml = new XMLHttpRequest();
        xml.open("GET",'wyszukaj_klient.php?wyszukaj_klient='+document.getElementById('wyszukaj_klient').value, true);
        
        xml.onreadystatechange = function(){
        if ( xml.readyState == 4  && xml.status == 200) {
            document.getElementById("wyszukanie_klient").innerHTML=xml.responseText;
            }
        };
        xml.send();
    }
    </script>


    
    
    