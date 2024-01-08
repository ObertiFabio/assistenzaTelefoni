<?php
    session_start();
    require 'connessione.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matricola = $_POST['matricola'];
        $password = md5($_POST['password']); // Hash the password using MD5
        
        $sql = "SELECT * FROM dipendenti WHERE matricola = ?";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("s", $matricola);
        $stmt->execute();
        $risultato = $stmt->get_result();

        
        if ($risultato->num_rows > 0) {
            $user = $risultato->fetch_assoc();
            if ($password == $user['password']) { // Compare the hashed password
                $_SESSION['loggedin'] = true;
                $_SESSION['matricola'] = $matricola;
                $_SESSION['ruolo'] = 'dipendente';
                header("Location: index.php ");
            } else {
                echo "Credenziali errate! Riprovare.<br>";
                header("Location: login.php?error=1");
            }
        }else {
            $sql = "SELECT * FROM manutentore WHERE id_manutentore = ?";
            $stmt = $connessione->prepare($sql);
            $stmt->bind_param("s", $matricola);
            $stmt->execute();
            $risultato = $stmt->get_result();

            if ($risultato->num_rows > 0) {
                $user = $risultato->fetch_assoc();
                if ($password == $user['password']) { // Compare the hashed password
                    $_SESSION['loggedin'] = true;
                    $_SESSION['matricola'] = $matricola;
                    $_SESSION['ruolo'] = $user['ruolo'];
                    header("Location: index.php ");
                } else {
                    echo "Credenziali errate! Riprovare.<br>";
                    header("Location: login.php?error=1");
                }
            }else {
                echo "Utente non esistente!<br>";
                header("Location: login.php?error=101");
            }
        }
        
        $stmt->close();
    }

    $connessione->close();
?>