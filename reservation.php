<?php
    $id=$_POST['id'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>환자 정보 관리 시스템</title>
</head>
<body>
  <h2>진료 예약</h2><br><br>
  진료를 예약합니다. 아래에 진료를 예약할 날짜를 기입해주세요.<br><br>
  <?php
    echo "<form action='reservation_check.php' method='post'>
    <input type='hidden' name='id' value='{$id}'>
    <input type='text' name='year'> 년<br>
    <input type='text' name='month'> 월<br>
    <input type='text' name='day'> 일<br><br>
    <input type='submit' value='예약'>
    </form><br>";
    echo "<form action='treatment.php' method='post'>
    <input type='hidden' name='id' value='{$id}'>
    <input type='submit' value='취소'>
    </form>";
  ?>
</body>
</html>