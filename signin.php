<?php
    $conn=mysqli_connect("localhost", "root", "1111", "hospital");
    $id=$_POST['id'];
    $pw=$_POST['pw'];

    mysqli_query($conn, "set session character_set_connection=utf8");
    mysqli_query($conn, "set session character_set_results=utf8");
    mysqli_query($conn, "set session character_set_client=utf8");

    $sql="select * from member where id='{$id}'";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    $_pw=$row['pw'];

    if($num){
        if($pw!=$_pw){
            echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        }
        else{
            echo "정상적으로 로그인되었습니다.<br><br>";
            echo "<form action='mypage.php' method='post'>
            <input type='hidden' name='id' value='{$id}'>
            <input type='submit' value='확인'>
            </form>";
        }
    }
    else{
        echo "<script>alert('아이디가 존재하지 않습니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
?>