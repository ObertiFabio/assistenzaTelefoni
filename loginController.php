//avvia sessione

<?php
    session_start();
    include 'connessione.php';

    $matricola = $_POST['matricola'];
    $password = $_POST['password'];
    $password=md5($password);

    try{
        $sql = "SELECT * FROM dipendenti WHERE matricola = '$matricola' AND password = '$password'";
        $result = $connessione->query($sql);

        if($result->num_rows > 0){
            echo "Login effettuato con successo!";
            $_SESSION['matricola'] = $matricola;
            $_SESSION['password'] = $password;
            header("location: /www/index.php");
        }else{
            echo "Errore: Matricola o password non validi. Perfavore riprovare!";
            header("location: /www/login.php?error=1");
        }
    
    }catch(Exception $e){
        echo $e->getMessage();
        header("location: /www/login.php?error=$e");
    }

?>
