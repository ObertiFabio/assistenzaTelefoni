<?php
    session_start();
    require 'connessione.php';

    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if(isset($data["id_richiesta"])){
       $id=$data["id_richiesta"];

       $sql= "DELETE FROM richiesta WHERE id_richiesta =?";
       $stmt = $connessione->prepare($sql);
       $stmt->bind_param("s", $id);

        if($stmt->execute()){
                               
        } else{
            
        }
        exit;
    }
?>