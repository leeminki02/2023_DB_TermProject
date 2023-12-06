<!-- create new patient -->
<?php
session_start();
$db = new SQLite3('../termp.db');
$did = $_SESSION["did"];

$type = $_POST["type"];
$sid = $_POST["sid"];
$pid = $_POST["pid"];
$date = $_POST["date"];
$time = $_POST["time"];
$description = $_POST["description"];


// types: 1->create, 3->update, 4->delete
if ($type == 1) {
    $stmt = $db->prepare('INSERT INTO SCHEDULE (did, pid, date, time, description) VALUES (:did, :pid, :date, :time, :description)');
    $stmt->bindValue(':did', $did, SQLITE3_INTEGER);
    $stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
    $stmt->bindValue(':date', $date, SQLITE3_TEXT);
    $stmt->bindValue(':time', $time, SQLITE3_TEXT);
    $stmt->bindValue(':description', $description, SQLITE3_TEXT);

    // Execute the statement
    $results = $stmt->execute();

    echo "<script>
    alert('Patient created!');
    history.go(-1);
    </script>";
    exit;

} elseif ($type == 3) {
    $stmt = $db->prepare('UPDATE SCHEDULE SET pid = :pid, did = :did, date = :date, time = :time, description = :description WHERE sid = :sid');
    $stmt->bindValue(':sid', $sid, SQLITE3_INTEGER);
    $stmt->bindValue(':did', $did, SQLITE3_INTEGER);
    $stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
    $stmt->bindValue(':date', $date, SQLITE3_TEXT);
    $stmt->bindValue(':time', $time, SQLITE3_TEXT);
    $stmt->bindValue(':description', $description, SQLITE3_TEXT);

    // Execute the statement
    $results = $stmt->execute();

    if ($db->changes() > 0){
        echo "<script>
        alert('Schedule updated!');
        history.go(-1);
        </script>";
    } else {
        echo "<script>
        alert('Failed to update: No schedule with given sid!');
        history.go(-1);
        </script>";
    }
    exit;

} elseif ($type == 4) {
    // check if pid and name, phone match case exists, and delete
    $stmt = $db->prepare('DELETE FROM SCHEDULE WHERE sid = :sid AND pid = :pid AND did = :did');
    $stmt->bindValue(':sid', $sid, SQLITE3_INTEGER);
    $stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
    $stmt->bindValue(':did', $did, SQLITE3_INTEGER);

    // Execute the statement
    $results = $stmt->execute();

    if ($db->changes() > 0){
        echo "<script>
        alert('Schedule deleted!');
        history.go(-1);
        </script>";
    } else {
        echo "<script>
        alert('Failed to delete schedule!');
        history.go(-1);
        </script>";
    }
    exit;
}
?>