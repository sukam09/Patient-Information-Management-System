<?php
    $id=$_POST['id'];

    $conn=mysqli_connect("localhost", "root", "1111", "hospital");

    mysqli_query($conn, "set session character_set_connection=utf8");
    mysqli_query($conn, "set session character_set_results=utf8");
    mysqli_query($conn, "set session character_set_client=utf8");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>환자 정보 관리 시스템</title>
</head>
<body>
  <h2>예약 삭제</h2><br><br>
  예약을 삭제합니다. 예약을 삭제할 날짜를 기입해주세요.<br><br>
  <?php
    echo "<strong>예약 내역</strong><br>";
    echo "번호 날짜<br>";

    $sql="select r.date from reservation r, patient p, member m where r.ssn=p.ssn and p.id=m.id and m.id='{$id}' order by date";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    for($i=1;$i<=$num;$i++){
        $row=mysqli_fetch_array($result);
        echo "{$i} {$row['date']}<br>";
    }

    echo "<br>";
    echo "<form action='deletion_check.php' method='post'>
    <input type='hidden' name='id' value='{$id}'>
    <input type='text' name='year'> 년<br>
    <input type='text' name='month'> 월<br>
    <input type='text' name='day'> 일<br><br>
    <input type='submit' value='삭제'>
    </form><br>";
    echo "<form action='treatment.php' method='post'>
    <input type='hidden' name='id' value='{$id}'>
    <input type='submit' value='취소'>
    </form>";
  ?>
</body>
</html>