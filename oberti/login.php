<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Benvenuto a DefaultDevice Organizer!</h1>
    <h2>Accedi:</h2>
    <form method="POST" action="loginController.php">
        <label for="matricola">Matricola:</label>
        <input type="text" id="matricola" name="matricola" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <br>
    <a href="registra.php"><button>Registrati</button></a>
    <?php
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo $_GET['error'];
            echo "<br><br><p style='color: red;'>Errore: Matricola o password non validi. Perfavore riprovare!</p>";
        }
        if (isset($_GET['error']) && $_GET['error'] == 101) {
            echo $_GET['error'];
            echo "<br><br><p style='color: red;'>Errore: Matricola o password non validi. Perfavore riprovare!</p>";
        }
    ?>
</body>
</html>
