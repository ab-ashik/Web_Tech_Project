<?php
include("head.php");
include("../controller/db/conn.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../view/css/registration.css">
  <title>Document</title>
</head>

<body>
  <div class="login_form">
    <form method="POST" action="../controller/db/insert_reg_data.php" onsubmit="return regcheck();return false"  id="Formid">
      <h1>Registration</h1>

      <label for="">Full Name</label>
      <input type="text" id="clientName" name="clientName" placeholder="Enter your name"><small  style="color: red;"id="nameerr"></small><br>
      <label for="">UserName</label>
      <input type="text" id="clientId" name="clientId" placeholder="Enter your username"><small style="color: red;"id="uiderr"></small><br>
      <label for="">Email Address</label>
      <input type="text" id="clientEmail" name="clientEmail" placeholder="Enter your email"><small style="color: red;"id="emailerr"></small><br>
      <label for="">Phone Number</label>
      <input type="text" id="clientPhone" name="clientPhone" placeholder="Enter your phone number"><small style="color: red;"id="phnerr"></small><br>
      <label for="">Address</label>
      <input type="text" id="clientAddress" name="clientAddress" placeholder="Enter your address"><small style="color: red;"id="addresserr"></small><br>
      <label for="clientGender">Gender</label>
      <select name="clientGender" id="clientGender">
        <option value="">Your Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="other">Other</option>
      </select><br>
      <small id="gendererr"style="color: red;"></small><br>

      <label for="">Password</label>
      <input type="password" id="clientPass" name="clientPass" placeholder="Enter your password"><small id="passerr"style="color: red;"></small><br>
      <label for="">Confirm Password</label>
      <input type="password" id="Cpass" name="Cpass" placeholder="Confirm your password"><small id="cpasserr" style="color:red;"></small><br>

      <label for="role">Select Your Role</label>
      <select id="role" name="role">
      <option value="">Your role</option>
      <option value="client">Client</option>
      <option value="vendor">Vendor</option>
      <!-- <option value="moderator">Moderator</option> -->
      </select><br>
      <small id="roleerr"style="color: red;"></small><br>


      <input type="submit" style="margin-top: 15px;"name="submit" value="Register" onclick="">
    </form>
  </div>


  <script src="../controller/registration_check.js"></script>
  <script>
    
  </script>


<?php

  

?>

</body>

</html>

<?php
include("footer.php");
?>