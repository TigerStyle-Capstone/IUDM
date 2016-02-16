<?php
$servername = "db.soic.indiana.edu";
$username = "caos16_team59";
$password = "my+sql=caps16_team59";
$dbname = "caps16_team59";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>
