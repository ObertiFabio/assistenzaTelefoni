
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <?php
        session_start();
        require 'connessione.php';

        if (!isset($_SESSION['matricola'])) {
            // Redirect to login page if not logged in
            header("Location: login.php");
            exit();
        }
        //UPDATE DELLO STATO DELLA RICHIESTA
        $id_richiesta = $_GET['id_richiesta'];
        $sql = "UPDATE richiesta SET stato='RIPARATO' WHERE id_richiesta = ?";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("s", $id_richiesta);
        $stmt->execute();
        $stmt->close();


        echo "TELEFONO RIPARATO!<br>";
        echo "<a href='visualizzaRichiesteManutentore.php'><button>Torna indietro</button></a>";
    ?>
</html>