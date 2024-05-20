<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <h1>Registrazione cellulare</h1>
    <form method="POST" action="registraCellulareController.php">
        <label for="id_cellulare">Inserisci l'ID del cellulare:</label>
        <input type="text" name="id_cellulare" id="id_cellulare" required><br>

        <label for="marca">Inserisci la Marca:</label>
        <input type="text" name="marca" id="marca" required><br>

        <label for="garanzia">Inserisci la garanzia:</label>
        <input type="text" name="garanzia" id="garanzia" required><br>
        
        <input type="submit" value="Registrata cellulare">
    </form>
    <?php
    /*
        if (isset($_GET['error']) && $_GET['error'] == 2) {
            echo "<br>email already in use";
        }
        if (isset($_GET['error']) && $_GET['error'] == 3) {
            echo "<br>id_manutentore  already in use";
        }
        */
    ?>
</body>
</html>