<?php
session_start();
    require 'connessione.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_manutentore = $_POST['id_manutentore'];
        $nome = $_POST['nome'];
        $foto = $_POST['foto'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Hash the password using MD5

        $password=md5($password);


        // Check if id_manutentore already exists
        $sql = "SELECT * FROM manutentore WHERE id_manutentore = ?";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("s", $id_manutentore);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            header("Location: registra.php?error=3");
            exit();
        }

        // Check if email already exists
        $sql = "SELECT * FROM manutentore WHERE email = ?";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            header("Location: registra.php?error=2");
            exit();
        }

        // Insert the new manutentore
        $ruolo="manutentore";
        $sql = "INSERT INTO manutentore (id_manutentore, nome,foto, email, password, ruolo) VALUES (?, ?, ?, ?, ?,?)";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("ssssss", $id_manutentore, $nome, $foto, $email, $password, $ruolo);
        
        if ($stmt->execute()) {
            echo "manutentore registrato correttamente";
        } else {
            echo "Errore: " . $sql . "<br>" . $connessione->error;
        }
        
        $stmt->close();
    }

    $connessione->close();
?>

<body>
    <br> <a href = "./index.php">Torna alla home</a>
</body>