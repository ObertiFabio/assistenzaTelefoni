<?php
    session_start();
    require 'connessione.php';

    if(!isset($_POST["id_richiesta"])){
       $id=$_POST["id"];
       $manutentore_id= $_SESSION["matricola"];

       $sql= "UPDATE richiesta SET manutentore_id = ?, stato='presa in carico' WHERE id_richiesta = ?";
       $stmt = $connessione->prepare($sql);
       $stmt->bind_param("ss", $manutentore_id, $id);

        if($stmt->execute()){
            echo "Richiesta presa in carico";
        } else{
            echo "Errore: " . $sql . "<br>" . $connessione->error;
        }
        exit;
    }
?>