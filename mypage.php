<?php
    $id=$_POST['id'];

    $conn=mysqli_connect("localhost", "root", "1111", "hospital");

    mysqli_query($conn, "set session character_set_connection=utf8");
    mysqli_query($conn, "set session character_set_results=utf8");
    mysqli_query($conn, "set session character_set_client=utf8");

    $sql="select p.* from member m, patient p where m.id='{$id}' and m.id=p.id";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    $name=$row['name'];
    $age=$row['age'];
    $sex=$row['sex'];
    $phone=$row['phone'];
    
    $sql="select d.name from member m, patient p, doctor d where m.id='{$id}' and m.id=p.id and p.pno=d.essn";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    $doctor=$row['name'];

    $sql="select s.name from member m, patient p, doctor d, department s where m.id='{$id}' and m.id=p.id and p.pno=d.essn and d.essn=s.dno";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    $department=$row['name'];

    $sql="select n.name from member m, patient p, nok n where m.id='{$id}' and m.id=p.id and p.ssn=n.ssn";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    $nok=$row['name'];

    $sql="select n.name from member m, patient p, nurse_attend a, nurse n where m.id='{$id}' and m.id=p.id and p.ssn=a.ssn and a.essn=n.essn";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>환자 정보 관리 시스템</title>
</head>
<body>
  <h2>마이페이지</h2><br><br>
  <?php
    echo "{$name} 님, 환영합니다.";
  ?>
  <input type='button' value='로그아웃' onclick="location.href='signout.php'"><br><br>
  <?php
    echo "<strong>이름</strong> {$name}<br><br>";
    echo "<strong>나이</strong> {$age}<br><br>";
    echo "<strong>성별</strong> {$sex}<br><br>";
    echo "<strong>전화번호</strong> {$phone}<br><br>";
    echo "<strong>진료과목</strong> {$department}<br><br>";
    echo "<strong>주치의</strong> {$doctor}<br><br>";

    echo "<strong>담당 간호사</strong> ";
    for($i=0;$i<$num;$i++){
        $row=mysqli_fetch_array($result);
        echo "{$row['name']} ";
    }
    echo "<br><br>";

    echo "<strong>보호자</strong> {$nok}<br><br>";

    echo "<form action='treatment.php' method='post'>
    <input type='hidden' name='id' value='{$id}'>
    <input type='submit' value='진료 및 예약 내역'>
    </form>";

    echo "<br>";
    echo "<form action='withdraw.php' method='post'>
    <input type='hidden' name='id' value='{$id}'>
    <input type='submit' value='회원탈퇴'>
    </form>";
  ?>
</body>
</html>