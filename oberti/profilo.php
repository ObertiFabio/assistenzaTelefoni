<html>
    <body>
        <h1>Questi sono i tuoi dati!!</h1>
        

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

    $ruolo = $_SESSION['ruolo'];

    switch ($ruolo) {
        case 'amministratore':
        case 'manutentore':
            $stmt = $connessione->prepare('SELECT * FROM manutentore WHERE id_manutentore = ?');
            $stmt->bind_param('s', $_SESSION['matricola']);
            $stmt->execute();
            $result = $stmt->get_result();
            $amministratore = $result->fetch_assoc();
            echo "<div><strong>ID_manutentore:</strong> {$amministratore['id_manutentore']}</div>";
            echo "<div><strong>Nome:</strong> {$amministratore['nome']}</div>";
            echo "<div><strong>Email:</strong> {$amministratore['email']}</div>";
            echo "<div><strong>Ruolo:</strong> {$amministratore['ruolo']}</div>";
            break;
        
        case 'dipendente':
            // Assuming the table name for dipendente is 'dipendente'
            $stmt = $connessione->prepare('SELECT * FROM dipendenti WHERE matricola = ?');
            $stmt->bind_param('s', $_SESSION['matricola']);
            $stmt->execute();
            $result = $stmt->get_result();
            $dipendenti = $result->fetch_assoc();
            echo "<div><strong>Matricola:</strong> {$dipendenti['matricola']}</div>";
            echo "<div><strong>Nome:</strong> {$dipendenti['nome']}</div>";
            echo "<div><strong>Email:</strong> {$dipendenti['email']}</div>";
            echo "<div><strong>mansione:</strong> {$dipendenti['mansione']}</div>";
            break;
            
            default:
            header("Location: login.php");
            break;
    }
    
    
    
    
    
?>
<a href="index.php">Torna alla Home</a>

