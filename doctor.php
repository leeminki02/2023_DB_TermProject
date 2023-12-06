<!-- functions
- schedule
    - show schedule of doctor self

-->

<?php
session_start();
$db = new SQLite3('termp.db');
$did = $_SESSION["did"];

$stmt = $db->prepare('SELECT * FROM DOCTORS WHERE did = :did');
$stmt->bindValue(':did', $did, SQLITE3_INTEGER);

// Execute the statement
$sched = $stmt->execute();

while ($row = $sched->fetchArray()) {
    echo "Hello, " . $row['name'] . ". ( Department: " . $row['specialty']. " )<br>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor</title>
</head>
<body>
<h2>나의 일정</h2> 

<?php
$cnt_stmt = $db->prepare('SELECT COUNT(*) FROM SCHEDULE WHERE did = :did');
$cnt_stmt->bindValue(':did', $did, SQLITE3_INTEGER);
$cnt = $cnt_stmt->execute()->fetchArray()[0];
echo "You have total " . $cnt . " schedules.<br>";


$stmt = $db->prepare('SELECT SCHEDULE.sid, SCHEDULE.date, SCHEDULE.time, SCHEDULE.description, 
                        PATIENTS.phone, PATIENTS.name
                        FROM SCHEDULE 
                        INNER JOIN PATIENTS 
                        ON SCHEDULE.pid = PATIENTS.pid
                        WHERE SCHEDULE.did = :did
                        ;');
$stmt->bindValue(':did', $did, SQLITE3_INTEGER);
// Execute the statement
$sched = $stmt->execute();

while ($row = $sched->fetchArray(SQLITE3_ASSOC)) {
    echo "Schedule #". $row['sid'] ." with " . $row['name'] . "(phone: " . $row['phone'] ."): ";
    echo $row['date'] . " " . $row['time'] . " - " . $row['description'] . "<br>";
}
?>


<h2>환자 검색</h2>
<form method="post" action="search_patient.php">
    이름: <input type="text" name="name"><br>
    연락처: <input type="text" name="phone"><br>
    <input type="submit" value="search_patient">
</form>

<h2>환자 레코드 검색</h2>
<form method="post" action="search_record.php">
    이름: <input type="text" name="name"><br>
    연락처: <input type="text" name="phone"><br>
    <input type="submit" value="search_record">
</form>

<button onclick="location.href='./patient/'">환자 생성/수정/삭제하기</button>
<br>

<button onclick="location.href='./record/'">진료기록 생성하기</button>
<br>

<button onclick="location.href='./schedule/'">일정 생성/수정/삭제하기</button>

</body>
</html>