<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="loginController.php">
        <label for="matricola">Matricola:</label>
        <input type="matricola" id="matricola" name="matricola" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <br>
    <a href="registra.php"><button>Registrati</button></a>
    <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo $e -> $_GET['error'];
            echo "<br><br><p style='color: red;'>Errore: Nome utente o password non validi. Perfavore riprovare!</p>";
        }
    ?>
</body>
</html>
