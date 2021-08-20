<?php
    $conn=mysqli_connect("localhost", "root", "1111", "hospital");
    $id=$_POST['id'];
    $year=$_POST['year'];
    $month=$_POST['month'];
    $day=$_POST['day'];

    mysqli_query($conn, "set session character_set_connection=utf8");
    mysqli_query($conn, "set session character_set_results=utf8");
    mysqli_query($conn, "set session character_set_client=utf8");

    $sql="select r.* from reservation r, patient p, member m where r.ssn=p.ssn and p.id=m.id and m.id='{$id}' and r.date='{$year}-{$month}-{$day}'";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);

    if($num){
        $sql="delete r from reservation r, patient p, member m where r.ssn=p.ssn and p.id=m.id and m.id='{$id}' and r.date='{$year}-{$month}-{$day}'";
        mysqli_query($conn, $sql);

        echo "해당 예약이 정상적으로 삭제되었습니다.<br><br>";
        echo "<form action='treatment.php' method='post'>
        <input type='hidden' name='id' value='{$id}'>
        <input type='submit' value='확인'>
        </form>";
    }
    else{
        echo "해당 날짜에 예약이 존재하지 않습니다. 다른 날짜를 선택해주세요.<br><br>";
        echo "<form action='deletion.php' method='post'>
        <input type='hidden' name='id' value='{$id}'>
        <input type='submit' value='확인'>
        </form>";
    }
?>