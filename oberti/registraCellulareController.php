<?php
session_start();
    require 'connessione.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_cellulare = $_POST['id_cellulare'];
        $marca = $_POST['marca'];
        $garanzia = $_POST['garanzia'];
        

        

        //inserisci un  nuovo cellulare
        $sql="INSERT INTO cellulare (id_cellulare, marca, garanzia) VALUES (?,?,?)";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("sss", $id_cellulare, $marca, $garanzia);

    
        if ($stmt->execute()) {
            echo "cellulare registrato correttamente";
        } else {
            echo "Errore: " . $sql . "<br>" . $connessione->error;
        }
        
        $stmt->close();
    }
    
    $connessione->close();
?>

<body>
    <br> <a href = "./index.php">Torna alla home</a>
</body>