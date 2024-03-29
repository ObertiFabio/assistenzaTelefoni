<?php
    session_start();
    require 'connessione.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dipendente_matricola=$_SESSION['matricola'];
        $descrizione = $_POST['descrizione'];
        $data = $_POST['data']; // Hash the password using MD5
        $stato="inviata";
        $manutentore_id=null;
        $cellulare_id=$_POST['cellulare_id'];
       // echo $_POST['cellulare_id'];

        // Insert the new request
        $sql = "INSERT INTO richiesta (dipendente_matricola, descrizione, data, stato, manutentore_id, cellulare_id) VALUES (?,?,?,?,?,?)";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("ssssss", $dipendente_matricola, $descrizione, $data, $stato, $manutentore_id, $cellulare_id);

        if ($stmt->execute()) {
           echo "richiesta ricevuta! Provvederemo a risolvere il problema<br>";
        } else {
            echo "Errore: " . $sql . "<br>" . $connessione->error;
        }
        
        $stmt->close();
    }

    $connessione->close();
?>
<body>
    <br><a href = "./index.php">Torna alla home</a>
</body>