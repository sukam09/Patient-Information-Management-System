<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>환자 정보 관리 시스템</title>
</head>
<body>
  <h2>환자 정보 관리 시스템</h2><br><br>
  환자 정보 관리 시스템에 오신 것을 환영합니다.<br>
  서비스를 이용하시려면 먼저 로그인을 해주세요.<br><br>
  <form action='signin.php' method='post'>
    아이디 <input type='text' name='id'><br><br>
    비밀번호 <input type='text' name='pw'><br><br>
    <input type='submit' value='로그인'>
  </form>
  <br><br>
  아직 회원이 아니신가요? <input type='button' value='회원가입' onclick="location.href='signup.php'">
</body>
</html>