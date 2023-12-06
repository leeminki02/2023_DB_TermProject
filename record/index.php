<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>기록 생성하기</title>
</head>
<body>
    <h1>진료 기록 생성하기</h1>
    <form method="post" action="crud_record.php">
        <input type="hidden" name="type" value=1>
        <input type="number" name="pid" placeholder="환자 ID">
        <input type="date" name="date" placeholder="날짜"><br>
        <input type="time" name="time" placeholder="시간">
        <input type="text" name="description" placeholder="내용"><br>
        <input type="submit" value="진료기록 등록하기">
    </form>
    <br>
    <p>진료 기록은 삭제할 수 없습니다.</p>
</body>
</html>