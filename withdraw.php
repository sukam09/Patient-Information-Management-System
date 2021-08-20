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
  <h2>회원탈퇴</h2><br><br>
  정말로 탈퇴하시겠습니까?<br><br>
  <?php
    echo "<form action='withdraw_ok.php' method='post'>
        <input type='hidden' name='id' value='{$id}'>
        <input type='submit' value='예'>
    </form><br>
    <form action='mypage.php' method='post'>
        <input type='hidden' name='id' value='{$id}'>
        <input type='submit' value='아니오'>
    </form>";
  ?>
</body>
</html>