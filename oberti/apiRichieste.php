<?php

include 'connessione.php';


// Retrieve all users from the database
$sql = "SELECT * FROM richiesta";
$result = $connessione->query($sql);

if ($result->num_rows > 0) {
    $richieste = array();
    while ($row = $result->fetch_assoc()) {
        $richieste[] = $row;
    }
    // Convert the users array to JSON
    $json = json_encode($richieste , JSON_PRETTY_PRINT);

    // Set the response headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    // Output the JSON data
    echo $json;
} else {
    echo "No users found.";
}

$connessione->close();

?>