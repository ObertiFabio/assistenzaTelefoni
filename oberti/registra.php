<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <h1>Registrazione</h1>
    <form method="POST" action="registraController.php">
        <label for="matricola">Inserisci Matricola:</label>
        <input type="text" name="matricola" id="matricola" required><br>

        <label for="nome">Inserisci il nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="email">Inserisci Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="mansione">Inserisci la Mansione:</label>
        <input type="text" name="mansione" id="mansione" required><br>

        <label for="password">Inserisci la Password:</label>
        <input type="password" name="password" id="password" required><br>
        <!--
        <label for="password">Conferma la Password:</label>
        <input type="password" name="confirmPassword" id="confirmPassword" required><br>
        -->
        <input type="submit" value="Registrati">
    </form>
    <?php
        if (isset($_GET['error']) && $_GET['error'] == 2) {
            echo "<br>email already in use";
        }
        if (isset($_GET['error']) && $_GET['error'] == 3) {
            echo "<br>matricola already in use";
        }
        /*
        if (isset($_GET['error']) && $_GET['error'] == 4) {
            echo "<br>Passwords do not match! Please retry.";
        }
        */
    ?>
</body>
</html>