<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
<body>
    <h1>Registrazione</h1>
    <form method="POST" action="registraController.php">
        <label for="matricola">Inserisci Matricola:</label>
        <input type="text" name="matricola" id="matricola" required><br>

        <label for="email">Inserisci Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Inserisci la Password:</label>
        <input type="password" name="password" id="password" required><br>
        
        
        <input type="submit" value="Register">
    </form>
    <?php
        if (isset($_GET['error']) && $_GET['error'] == 2) {
            echo "<br>email already in use";
        }
        if (isset($_GET['error']) && $_GET['error'] == 3) {
            echo "<br>matricola already in use";
        }
    ?>
</body>
</html>