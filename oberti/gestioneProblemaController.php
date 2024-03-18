<?php
    session_start();
    require 'connessione.php';
    
    // Check if the user is logged in
    if (!isset($_SESSION['matricola'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }

    $id_richiesta=$_POST["id_richiesta"];
    $tipo=$_POST["tipo"];
    $tempo_riparazione=$_POST["tempo_riparazione"];
    
    $sql = "INSERT INTO problema (tipo,tempo_riparazione) VALUES (?,?)";
    $stmt = $connessione->prepare($sql);
    $stmt->bind_param("ss", $tipo, $tempo_riparazione);

    if ($stmt->execute()) {
        echo "Descrizione problema inviato con successo!<br>";
        //recuper l'id del problema appena inserito
        $id_problema = $connessione->insert_id; // Get the auto generated id used in the latest query
    } else {
         echo "Errore: " . $sql . "<br>" . $connessione->error;
    }
    $stmt->close();


    $query2="UPDATE richiesta SET stato='completata' WHERE id_richiesta = ?";
    $stmt2= $connessione->prepare($query2);
    $stmt2->bind_param("s", $id_richiesta);
    if($stmt2->execute()){
        echo "Sato della richiesta modificato<br>";
    }
    else{
        echo "Errore: " . $query2 . "<br>" . $connessione->error;
    }
    $stmt2->close();

    
    $query= "INSERT INTO contiene (id_richiesta, id_problema) VALUES (?,?)";
    $stmto = $connessione->prepare($query);
    $stmto->bind_param("ii", $id_richiesta, $id_problema);
    if ($stmto->execute()) {
        echo "Problema associato con successo!<br>";
    } else {
         echo "Errore: " . $query . "<br>" . $connessione->error;
    }

    
    $stmto->close();
    
    echo "<a href='index.php'>Torna alla home</a>";

    $connessione->close();
?>