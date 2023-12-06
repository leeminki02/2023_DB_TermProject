<?php
session_start();
$db = new SQLite3('termp.db');
$pid = $_SESSION["pid"];

$stmt = $db->prepare('SELECT * FROM PATIENTS WHERE pid = :pid');
$stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);

// Execute the statement
$sched = $stmt->execute();

while ($row = $sched->fetchArray()) {
    echo "Hello, " . $row['name'] . "(age: " . $row['age']. ").<br>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient</title>
</head>
<body>
<h2>나의 일정</h2> 

<?php
$cnt_stmt = $db->prepare('SELECT COUNT(*) FROM SCHEDULE WHERE pid = :pid');
$cnt_stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
$cnt = $cnt_stmt->execute()->fetchArray()[0];
echo "You have total " . $cnt . " schedules.<br>";


$stmt = $db->prepare('SELECT SCHEDULE.date, SCHEDULE.sid, SCHEDULE.time, SCHEDULE.description, 
                             DOCTORS.name, DOCTORS.specialty
                        FROM SCHEDULE 
                        INNER JOIN DOCTORS 
                        ON SCHEDULE.did = DOCTORS.did
                        WHERE SCHEDULE.pid = :pid
                        ;');
$stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
// Execute the statement
$sched = $stmt->execute();

while ($row = $sched->fetchArray(SQLITE3_ASSOC)) {
    echo "Schedule ". $row['sid'] ." with " . $row['name'] . ": ";
    echo $row['date'] . " " . $row['time'] . " - " . $row['description'] . "<br>";
}
?>

<h2>나의 진료기록</h2>
<?php
$cnt_stmt = $db->prepare('SELECT COUNT(*) FROM RECORDS WHERE pid = :pid');
$cnt_stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
$cnt = $cnt_stmt->execute()->fetchArray()[0];
echo "You have total " . $cnt . " records.<br>";

$stmt = $db->prepare('SELECT * FROM RECORDS WHERE pid = :pid');
$stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
// Execute the statement
$records = $stmt->execute();

while ($row = $records->fetchArray(SQLITE3_ASSOC)) {
    echo "Record on " . $row['date'] . ": ";
    echo $row['description'] . "<br>";
}


// $stmt = $db->prepare('SELECT SCHEDULE.date, SCHEDULE.time, SCHEDULE.description, PATIENTS.phone, PATIENTS.name
//                         FROM SCHEDULE 
//                         INNER JOIN PATIENTS 
//                         ON SCHEDULE.pid = PATIENTS.pid
//                         WHERE SCHEDULE.pid = :pid
//                         ;');
// $stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
// // Execute the statement
// $sched = $stmt->execute();

// while ($row = $sched->fetchArray(SQLITE3_ASSOC)) {
//     echo "Schedule with " . $row['name'] . "(phone: " . $row['phone'] ."): ";
//     echo $row['date'] . " " . $row['time'] . " - " . $row['description'] . "<br>";
// }
?>

</body>
</html>