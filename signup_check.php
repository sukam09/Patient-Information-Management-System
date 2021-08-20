<?php
    $conn=mysqli_connect("localhost", "root", "1111", "hospital");
    $id=$_POST['id'];
    $pw=$_POST['pw'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $phone=$_POST['phone'];

    mysqli_query($conn, "set session character_set_connection=utf8");
    mysqli_query($conn, "set session character_set_results=utf8");
    mysqli_query($conn, "set session character_set_client=utf8");

    $sql="select * from member where id='{$id}'";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);

    if($num){
        echo "<script>alert('이미 존재하는 아이디입니다. 다른 아이디를 입력해주세요.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=signup.php'>";
    }
    else{
        $sql="insert into member values ('{$id}', '{$pw}')";
        mysqli_query($conn, $sql);
        $sql="insert into patient values (NULL, '{$id}', '{$name}', {$age}, '{$sex}', '{$phone}', NULL)";
        mysqli_query($conn, $sql);
        
        echo "<script>alert('회원가입이 정상적으로 처리되었습니다.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
?>