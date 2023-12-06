<!-- create new patient -->
<?php
session_start();
$db = new SQLite3('../termp.db');
$did = $_SESSION["did"];

$type = $_POST["type"];
$pid = $_POST["pid"];
$name = $_POST["name"];
$age = $_POST["age"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$doctor = $_POST["doctor"];

// types: 1->create, 3->update, 4->delete
if ($type == 1) {
    $stmt = $db->prepare('INSERT INTO PATIENTS (name, age, phone, address, height, weight, doctor) VALUES (:name, :age, :phone, :address, :height, :weight, :doctor)');
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':age', $age, SQLITE3_INTEGER);
    $stmt->bindValue(':phone', $phone, SQLITE3_INTEGER);
    $stmt->bindValue(':address', $address, SQLITE3_TEXT);
    $stmt->bindValue(':height', $height, SQLITE3_INTEGER);
    $stmt->bindValue(':weight', $weight, SQLITE3_INTEGER);
    $stmt->bindValue(':doctor', $doctor, SQLITE3_INTEGER);


    // Execute the statement
    $results = $stmt->execute();

    // create new login credential
    // type, uid, passcode
    $stmt = $db->prepare('INSERT INTO login_cred (type, uid, passcode) VALUES (:type, :uid, :passcode)');
    $stmt->bindValue(':type', 0, SQLITE3_INTEGER);
    $created_uid = $db->lastInsertRowID();
    $stmt->bindValue(':uid', $created_uid, SQLITE3_INTEGER);
    $stmt->bindValue(':passcode', $phone, SQLITE3_TEXT);

    // Execute the statement
    $results = $stmt->execute();

    echo "<script>
    alert('Patient created!');
    alert('Patient ID: " . $created_uid . ", Passcode: " . $phone . "');
    history.go(-1);
    </script>";
    exit;

} elseif ($type == 3) {
    $stmt = $db->prepare('UPDATE PATIENTS SET phone = :phone, address = :address, height = :height, weight = :weight, doctor = :doctor WHERE pid = :pid AND name = :name');
    $stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':phone', $phone, SQLITE3_TEXT);
    $stmt->bindValue(':address', $address, SQLITE3_TEXT);
    $stmt->bindValue(':height', $height, SQLITE3_INTEGER);
    $stmt->bindValue(':weight', $weight, SQLITE3_INTEGER);
    $stmt->bindValue(':doctor', $doctor, SQLITE3_INTEGER);

    // Execute the statement
    $results = $stmt->execute();

    if ($db->changes() > 0){
        echo "<script>
        alert('Patient updated!');
        history.go(-1);
        </script>";
    } else {
        echo "<script>
        alert('Failed to update: No patient with given pid and name!');
        history.go(-1);
        </script>";
    }
    exit;

} elseif ($type == 4) {
    // check if pid and name, phone match case exists, and delete
    $stmt = $db->prepare('DELETE FROM PATIENTS WHERE pid = :pid AND name = :name AND phone = :phone');
    $stmt->bindValue(':pid', $pid, SQLITE3_INTEGER);
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':phone', $phone, SQLITE3_TEXT);

    // Execute the statement
    $results = $stmt->execute();

    if ($db->changes() > 0){
        echo "<script>
        alert('Patient deleted!');
        history.go(-1);
        </script>";
    } else {
        echo "<script>
        alert('Failed to delete: No patient with given pid, name and phone number!');
        history.go(-1);
        </script>";
    }
    exit;
}
?>