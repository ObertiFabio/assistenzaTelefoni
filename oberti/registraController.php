<?php
    session_start();
    require 'connessione.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matricola = $_POST['matricola'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mansione = $_POST['mansione'];
        $password = $_POST['password']; // Hash the password using MD5

        $password=md5($password);


        // Check if matricola already exists
        $sql = "SELECT * FROM dipendenti WHERE matricola = ?";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("s", $matricola);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            header("Location: registra.php?error=3");
            exit();
        }

        // Check if email already exists
        $sql = "SELECT * FROM dipendenti WHERE email = ?";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            header("Location: registra.php?error=2");
            exit();
        }

        // Insert the new user
        $sql = "INSERT INTO dipendenti (matricola, nome, email, mansione, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("sssss", $matricola, $nome, $email, $mansione, $password);
        
        if ($stmt->execute()) {
            header("Location: login.php");
        } else {
            echo "Errore: " . $sql . "<br>" . $connessione->error;
        }
        
        $stmt->close();
    }

    $connessione->close();
?>