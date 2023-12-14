<?php
    var_dump($_POST);
    $matricola = $_POST['matricola'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $password = $_POST['password'];
    $password=md5($password);
    $db = new mysquli('localhost', 'root', '', 'oberti');

    if($db->connect_error){
        echo("Connessione fallita: " . $db->connect_error);
        exit();
    }
    else{
        try{
            echo("Connessione effettuata correttamente");
            $la_query="insert into dipendente (matricola,nome,cognome,password) values('$matricola','$nome','$cognome','$password')";
            $db->query($la_query); 
            header("location: /login.php");
        }
        catch(Exception $e){
            $err=  $e->getMessage();
            //redirect registrazione.php
            header("location: /registra.php?err=$err");
        }
        
    }   
?>