<?php
session_start();
$db = new SQLite3('termp.db');
$did = $_SESSION["did"];

$pname = $_POST["name"];
$pphone = $_POST["phone"];

$stmt = $db->prepare('SELECT * FROM PATIENTS WHERE name = :pname OR phone = :pphone');
$stmt->bindValue(':pname', $pname, SQLITE3_TEXT);
$stmt->bindValue(':pphone', $pphone, SQLITE3_INTEGER);

// Execute the statement
$results = $stmt->execute();

while ($row = $results->fetchArray()) {
    echo "PID: ". $row['pid']. "<br>Name: " . $row['name'] . ", <br>Phone: " . $row['phone']. "<br>Address: " . $row['address'] . ", <br>Height: " . $row['height'] . "<br>Weight: " . $row['weight'] . "<br>Doctor: " . $row['doctor'] . "<br>";
}

?>