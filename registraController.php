<?php
    include "connessione.php";

    $matricola = $_POST['matricola'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password=md5($password);

    try{
        $registra = "INSERT INTO users (matricola, email, password) VALUES ('$matricola', '$email', '$password')";
        if($connessione->query($registra)){
            echo "Registrazione effettuata con successo!";
            header("location: /www/login.php");
        }
    }catch(Exception $e){
        echo $e->getMessage();
        echo "Errore: Registrazione non effettuata. Perfavore riprovare!";
        header("location: /www/registra.php");
    }
?>