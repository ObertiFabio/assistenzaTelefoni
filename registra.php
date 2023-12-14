<!DOCTYPE html>
<html>
    <body>
        <form action=registra.php method="POST">
            <input type="text" name="matricola" placeholder="matricola"/><br>
            <input type="text" name="cognome" placeholder="cognome"/><br>
            <input type="text" name="password" placeholder="password"/><br>
            <input type="submit" />
        </form>
        <?php
         if (isset($_GET["error"]) && $_GET["error"] == 1) {
            echo "<p style='color: red;'>Errore: Nome utente o password non validi. Perfavore riprovare!</p>";
        }
        ?>

        
    </body>
</html>