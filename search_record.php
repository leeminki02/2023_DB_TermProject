<!-- search record of a patient, using join of PATIENT and RECORDS table -->
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

print("<h1> Search results for $pname </h1>");

print("<h3> patient information </h3>");

while ($row = $results->fetchArray()) {
    echo "Name: " . $row['name'] . ", <br>Phone: " . $row['phone']. "<br>Address: " . $row['address'] . ", <br>Height: " . $row['height'] . "<br>Weight: " . $row['weight'] . "<br>Doctor: " . $row['doctor'] . "<br>";
    $pid = $row['pid'];
}

$stmt = $db->prepare('SELECT * FROM RECORDS WHERE pid = :pid');
$stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);

print("<h3> This patient's records: </h3>");

// Execute the statement
$results = $stmt->execute();

while ($row = $results->fetchArray()) {
    echo "Date: " . $row['date'] . ", Time: " . $row['time']. ", Description: " . $row['description'] . "<br>";
}

?>