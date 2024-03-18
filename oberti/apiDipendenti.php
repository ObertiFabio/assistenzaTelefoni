<?php

include 'connessione.php';


// Retrieve all users from the database
$sql = "SELECT * FROM dipendenti";
$result = $connessione->query($sql);

if ($result->num_rows > 0) {
    $dipendenti = array();
    while ($row = $result->fetch_assoc()) {
        $dipendenti[] = $row;
    }
    // Convert the users array to JSON
    $json = json_encode($dipendenti , JSON_PRETTY_PRINT);

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