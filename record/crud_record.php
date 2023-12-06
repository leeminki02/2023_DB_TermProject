<!-- create new patient -->
<?php
session_start();
$db = new SQLite3('../termp.db');
$did = $_SESSION["did"];
$type = $_POST["type"];
$pid = $_POST["pid"];
$date = $_POST["date"];
$time = $_POST["time"];
$description = $_POST["description"];

// types: 1->create, 3->update, 4->delete
if ($type == 1) {
    $stmt = $db->prepare('INSERT INTO RECORDS (did, pid, date, time, description) VALUES (:did, :pid, :date, :time, :description)');
    $stmt->bindValue(':did', $did, SQLITE3_INTEGER);
    $stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
    $stmt->bindValue(':date', $date, SQLITE3_TEXT);
    $stmt->bindValue(':time', $time, SQLITE3_TEXT);
    $stmt->bindValue(':description', $description, SQLITE3_TEXT);

    // Execute the statement
    $results = $stmt->execute();

    echo "<script>
    alert('Record created!');
    history.go(-1);
    </script>";
    exit;
}
?>