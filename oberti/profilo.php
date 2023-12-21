<html>
    <body>
        <h1>Questi sono i tuoi dati!!</h1>
        <

    </body>
</html>

<?php
    session_start();
    require 'connessione.php';

    if (!isset($_SESSION['matricola'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }

    $stmt = $connessione->prepare('SELECT * FROM dipendenti WHERE matricola = ?');
    $stmt->bind_param('s', $_SESSION['matricola']);
    $stmt->execute();
    $result = $stmt->get_result();
    $dipendenti = $result->fetch_assoc();

    if ($dipendenti === null) {
        // Redirect to login page if the user does not exist
        header("Location: login.php");
        exit();
    }

    echo "<div><strong>Matricola:</strong> {$dipendenti['matricola']}</div>";
    echo "<div><strong>Nome:</strong> {$dipendenti['nome']}</div>";
    echo "<div><strong>Email:</strong> {$dipendenti['email']}</div>";
    echo "<div><strong>mansione:</strong> {$dipendenti['mansione']}</div>";
?>
<a href="index.php">Torna alla Home</a>
```
