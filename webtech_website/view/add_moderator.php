<?php
session_start();

// $loginId=$_REQUEST["loginId"];
// $role=$_REQUEST["role"];

$loginId = $_SESSION["loginId"];
$role = $_SESSION["role"];

if (!isset($_COOKIE['status'])) {
  header('location: ../Model/login.php');
}

?>



<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../view/css/admin_index.css">
  <title></title>
  <style>
    table,
    th,
    td {
      border: 1px solid;
      text-align: center;
    }

    table {
      width: 100%;
    }

    .crud_mod {
      margin-left: 30%;
      margin-right: 30%;
      margin-top: 5%;
      margin-bottom: 5%;
      padding: 10px;
      border: 1px solid;
      text-align: center;
    }

    .crud_mod input[type="text"] {
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      outline: none;
    }

    .crud_mod input[type="submit"] {
      width: 25%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .crud_mod input[type="submit"]:hover {
      background-color: #45a049;
    }

    .crud_mod {
      border-radius: 5px;
      background-color: #f2f2f2;
    }

    .crud_mod h1 {
      font-size: 40px;
      margin-bottom: 20px;

    }
  </style>
</head>

<body>



  <header>
    <a href="" class="logo">Alpha Event Management</a>

    <ul class="navbar">
            <li><a href="index_admin.php">Home</a></li>
            <li><a href="view_activities.php">View_Activities</a></li>
            <li><a href="moderator_list.php">Moderator</a></li>
            <li><a href="add_moderator.php">Add Moderator</a></li>
            <li><a href="admin_vendor_list.php">Vendors</a></li>
            <li><a href="add_vendor.php">Add Vendors</a></li>
            <li><a href="admin_showReviews.php">View Complains</a></li>
        </ul>
    <div class="nav_btn" id="underline">
      <a href="#">[<?php echo $loginId ?>]</a>
      <a href="../controller/logout.php">Log Out</a>

    </div>
  </header>


  <form name="add_mod" method="POST" id="add_mod" action="" onsubmit="return modcheck(); return false" method="POST">

    <div class="crud_mod">
      <h1>Add Moderator</h1>

      <label for="mod_id">ID:</label>
      <input type="text" id="mod_id" name="mod_id" placeholder="Moderator ID"><p  style="color: red;"id="miderr"></p><br>

      <label for="mod_name">Name:</label>
      <input type="text" id="mod_name" name="mod_name" placeholder="Moderator Name"><p  style="color: red;"id="nameerr"></p><br>

      <label for="mod_email">Email Address:</label>
      <input type="text" id="mod_email" name="mod_email" placeholder="Moderator Email"><p  style="color: red;"id="emailerr"></p><br>

      <label for="mod_phone">Phone Number:</label>
      <input type="text" id="mod_phone" name="mod_phone" placeholder="Moderator Phone NO."><p  style="color: red;"id="phnerr"></p><br>

      <label for="mod_address">Address:</label>
      <input type="text" id="mod_address" name="mod_address" placeholder="Moderator Address"><p  style="color: red;"id="addresserr"></p><br>

      <label for="mod_pass">Password:</label>
      <input type="text" id="mod_pass" name="mod_pass" placeholder="Moderator Password"><p  style="color: red;"id="passerr"></p><br>

      <input type="submit" name="btn_mod_add" id="btn_mod_add" value="Add Moderator">
      <input type="submit" name="btn_mod_update" id="btn_mod_update" value="Update Data">
    </div>

  </form>







  <?php
  include("../controller/db/conn.php");


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  else {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['btn_mod_add'])) {
        $mod_id = $_POST['mod_id'];
        $mod_name = $_POST['mod_name'];
        $mod_email = $_POST['mod_email'];
        $mod_phone = $_POST['mod_phone'];
        $mod_adrs = $_POST['mod_address'];
        $mod_pass = $_POST['mod_pass'];


        $sql = "INSERT INTO moderator (mdId, mdName, mdEmail, mdPhone, mdAdrs, mdPassword)
        VALUES ('$mod_id', '$mod_name', '$mod_email', '$mod_phone', '$mod_adrs', '$mod_pass')";

        $sql2 = "INSERT INTO loginInfo (id, passwords, roles)
        VALUES ('$mod_id', '$mod_pass', 'moderator')";




        if ($conn->query($sql) === TRUE) {
          // echo "sql record created successfully <br>";
          header("Location: moderator_list.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        if ($conn->query($sql2) === TRUE) {
          header("Location: moderator_list.php");
          // echo "sql2 record created successfully <br>";
        } else {
          echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
      }
    }
    if(isset($_POST['btn_mod_update'])){
      $mod_id = $_POST['mod_id'];
      $mod_name = $_POST['mod_name'];
      $mod_email = $_POST['mod_email'];
      $mod_phone = $_POST['mod_phone'];
      $mod_adrs = $_POST['mod_address'];
      $mod_pass = $_POST['mod_pass'];

      $sql = "UPDATE moderator SET mdName='$mod_name', mdEmail='$mod_email', mdPhone='$mod_phone', mdAdrs='$mod_adrs', mdPassword='$mod_pass' WHERE mdId='$mod_id'";

      if ($conn->query($sql) === TRUE) {
        header("Location: moderator_list.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
   
  }
  $conn->close();

  ?>

  <p style="margin-bottom: 3rem;"></p>


  <script src="../controller/moderator_check.js"></script>
</body>

</html>


<?php
include("footer.php");
?>