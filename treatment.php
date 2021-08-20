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

    $sql="select t.date from member m, patient p, treatment t where m.id='{$id}' and m.id=p.id and p.ssn=t.ssn";
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
  <h2>진료 및 예약 내역</h2><br><br>
  <?php
    echo "<form action='mypage.php' method='post'>
    <input type='hidden' name='id' value='{$id}'>
    <input type='submit' value='마이페이지'>
    </form><br>";
    echo "<strong>이름</strong> {$name}<br><br>";
    echo "<strong>나이</strong> {$age}<br><br>";
    echo "<strong>성별</strong> {$sex}<br><br>";
    echo "<strong>진료과목</strong> {$department}<br><br>";
    echo "<strong>주치의</strong> {$doctor}<br><br>";
    echo "<strong>진료 내역</strong><br>";
    echo "번호 날짜<br>";
    for($i=1;$i<=$num;$i++){
        $row=mysqli_fetch_array($result);
        echo "{$i} {$row['date']}<br>";
    }
    echo "<br>";
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
    echo "<form action='reservation.php' method='post'>
    <input type='hidden' name='id' value='{$id}'>
    <input type='submit' value='예약'>
    </form><br>";
    echo "<form action='deletion.php' method='post'>
    <input type='hidden' name='id' value='{$id}'>
    <input type='submit' value='삭제'>
    </form>";
  ?>
</body>
</html>