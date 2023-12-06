
<?php
// login should get three parameters: user type(patient or doctor), id and passcode
// simple login, no encryption
// checkbox for if user is doctor
// typing fields for id and passcode
// submit button -> post request and if pass: redirect to doctor.php or patient.php
// if fail: alert and stay on login.php

session_start();
// Check if form is submitted
$db = new SQLite3('termp.db');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userType = $_POST["userType"];
    $id = $_POST["id"];
    $passcode = $_POST["passcode"];

    // Prepare the SQL statement
    $stmt = $db->prepare('SELECT * FROM login_cred WHERE uid = :id AND passcode = :passcode AND type = :userType');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->bindValue(':passcode', $passcode, SQLITE3_TEXT);
    $stmt->bindValue(':userType', $userType, SQLITE3_INTEGER);

    // Execute the statement
    $result = $stmt->execute();

    // Check if any rows were returned
    if ($result->fetchArray() === false) {
        echo "<script>
        alert('Incorrect ID or passcode!');
        history.go(-1);
        </script>";
        exit;
    } else {
        // Redirect to the correct page
        if ($userType == 1) {
            $_SESSION["did"] = $id;
            header("Location: doctor.php");
        } else {
            $_SESSION["pid"] = $id;
            header("Location: patient.php");
        }
        exit;
    }
}
?>
