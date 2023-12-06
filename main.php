<h1>Welcome! Login...</h1>
<form method="post" action="login.php">
    <!-- <input type="checkbox" name="userType" value=1> I am a doctor<br> -->
    <input type="radio" name="userType" value=1> Doctor<br>
    <input type="radio" name="userType" value=0> Patient<br>
    ID: <input type="text" name="id"><br>
    Passcode: <input type="password" name="passcode"><br>
    <input type="submit" value="Submit">
</form>