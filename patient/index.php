<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>환자 관리</title>
</head>
<body>
    <h1>환자 생성하기</h1>
    <form method="post" action="crud_patient.php">
        <input type="hidden" name="type" value=1>
        <input type="text" name="name" placeholder="이름">
        <input type="text" name="age" placeholder="나이"><br>
        <input type="text" name="address" placeholder="주소"><br>
        <input type="number" name="phone" placeholder="연락처"><br>
        <input type="number" name="height" placeholder="키">
        <input type="number" name="weight" placeholder="몸무게"><br>
        <input type="number" name="doctor" placeholder="담당의 ID">
        <input type="submit" value="환자 생성하기">
    </form>

    <h1>환자 수정하기</h1>
    <form method="post" action="crud_patient.php">
        <input type="hidden" name="type" value=3>
        <input type="text" name="pid" placeholder="환자번호">
        <input type="text" name="name" placeholder="이름"><br>
        <p>아래 정보들만 수정이 가능합니다.</p>
        <input type="text" name="age" placeholder="나이"><br>
        <input type="text" name="address" placeholder="주소"><br>
        <input type="number" name="phone" placeholder="연락처"><br>
        <input type="number" name="height" placeholder="키">
        <input type="number" name="weight" placeholder="몸무게"><br>
        <input type="number" name="doctor" placeholder="담당의 ID">
        <input type="submit" value="환자 수정하기">
    </form>
    
    <h1>환자 삭제하기</h1>
    <p>아래 항목들이 모두 일치해야만 삭제가 가능합니다.</p>
    <form method="post" action="crud_patient.php">
        <input type="hidden" name="type" value=4>
        <input type="text" name="pid" placeholder="환자번호">
        <input type="text" name="name" placeholder="이름">
        <input type="number" name="phone" placeholder="연락처">
        <input type="submit" value="환자 삭제하기">
    </form>
</body>
</html>