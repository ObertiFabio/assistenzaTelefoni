<?php
    include 'connessione.php';
    session_start();
    
?>
<html>
    <body>
        <h1>Benvenuto <?php echo $_SESSION['matricola']; ?></h1>
        <a href="logout.php">Logout</a>
    </body>
</html>