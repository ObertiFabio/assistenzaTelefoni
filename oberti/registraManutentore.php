<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
<body>
    <h1>Registrazione manutentore</h1>
    <form method="POST" action="registraManutentoreController.php">
        <label for="id_manutentore">Inserisci l'ID del manutentore:</label>
        <input type="text" name="id_manutentore" id="id_manutentore" required><br>

        <label for="nome">Inserisci il nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="foto">Inserisci la foto:</label>
        <input type="text" name="foto" id="foto" required><br>

        <label for="email">Inserisci la email:</label>
        <input type="text" name="email" id="email" required><br>

        <label for="password">Inserisci la Password:</label>
        <input type="password" name="password" id="password" required><br>
        
        <input type="submit" value="Registrata manutentore">
    </form>
    <?php
        if (isset($_GET['error']) && $_GET['error'] == 2) {
            echo "<br>email already in use";
        }
        if (isset($_GET['error']) && $_GET['error'] == 3) {
            echo "<br>id_manutentore  already in use";
        }
        
    ?>
</body>
</html>