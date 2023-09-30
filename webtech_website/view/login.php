<?php
include("../controller/db/conn.php");
include("head.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../view/css/login.css">
  <title>Document</title>
</head>

<body>

 


  <div class="login_form">
    <form method="POST" action="../controller/db/login_db_check.php" onsubmit="return loginValidation();return false;" id="Formid">
      <h1>_LOGIN_</h1>
      <label for="">Username</label>
      <input type="text" id="loginId" name="loginId" placeholder="Enter your Username"><small style="color: red;" id="uiderr"></small><br>

      <label for="">Password</label>
      <input type="password" id="loginPass" name="loginPass" placeholder="Enter your password"><small style="color: red;" id="passerr"></small><br>

      <input type="submit" id="Formid" name="submit" value="Log In" >
    </form>
  </div>


  <script src="../controller/login_check.js"></script>


</body>

</html>

<?php
include("footer.php");
?>