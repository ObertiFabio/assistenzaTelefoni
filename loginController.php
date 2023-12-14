//avvia sessione
session_start();
<?php
$matricola = $_POST['matricola'];
$password = $_POST['password'];
$password = md5($password); // Add a semicolon here

$db = new mysqli('localhost', 'root', '', 'oberti');

    if($db->connect_error){
        echo("Connessione fallita: " . $db->connect_error);
        exit();
    }
    else{
        try{
           $verifica = "SELECT * FROM dipendente WHERE matricola = '$matricola' AND password = '$password'";
           echo $verifica;
           $db->query($verifica);
           $result = $db->query($verifica);
              if($result->num_rows > 0){
                while($user=$result->fetch_array(MYSQLI_ASSOC())){
                 $nome= $dipendente["nome"];
                 $matricola= $dipendente["matricola"];
                 $_SESSION['nome'] = $nome;
                 $_SESSION['matricola'] = $matricola;
                }
              }
              $result->close();
              header("location: /profile.php");

        }
        catch(Exception $e){
            $err=  $e->getMessage();
            //redirect registrazione.php
            header("location: /registra.php?err=$err");
        }
        
    }   

?>