<?php
    $id=$_POST['id'];
    $conn=mysqli_connect("localhost", "root", "1111", "hospital");

    mysqli_query($conn, "set session character_set_connection=utf8");
    mysqli_query($conn, "set session character_set_results=utf8");
    mysqli_query($conn, "set session character_set_client=utf8");

    $sql="delete from member where id='{$id}'";
    mysqli_query($conn, $sql);

    echo "정상적으로 회원탈퇴가 완료되었습니다.<br><br>";
    echo "<form action='index.php' method='post'>
    <input type='submit' value='확인'>
    </form>";
?>