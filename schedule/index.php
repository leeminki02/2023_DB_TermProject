<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>일정 관리</title>
</head>
<body>
    <h1>일정 생성하기</h1>
    <form method="post" action="crud_schedule.php">
        <input type="hidden" name="type" value=1>
        <input type="number" name="pid" placeholder="환자 ID"><br>
        <input type="date" name="date" placeholder="날짜">
        <input type="time" name="time" placeholder="시간"><br>
        <input type="text" name="description" placeholder="내용"><br>
        <input type="submit" value="일정 생성하기">
    </form>

    <h1>일정 수정하기</h1>
    <form method="post" action="crud_schedule.php">
        <input type="hidden" name="type" value=3>
        <input type="text" name="sid" placeholder="일정 sID">
        <p>아래 정보들만 수정이 가능합니다.</p>
        <input type="number" name="did" placeholder="의사 ID">
        <input type="number" name="pid" placeholder="환자 ID"><br>
        <input type="date" name="date" placeholder="날짜">
        <input type="time" name="time" placeholder="시간"><br>
        <input type="text" name="description" placeholder="내용"><br>
        <input type="submit" value="일정 수정하기">
    </form>
    
    <h1>일정 삭제하기</h1>
    <p>아래 항목들이 모두 일치하는 본인의 일정만 삭제가 가능합니다.</p>
    <form method="post" action="crud_schedule.php">
        <input type="hidden" name="type" value=4>
        <input type="text" name="sid" placeholder="일정번호">
        <input type="number" name="pid" placeholder="환자 ID">
        <input type="submit" value="일정 삭제하기">
    </form>
</body>
</html>