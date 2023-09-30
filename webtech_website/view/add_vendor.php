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

    .crud_vendor {
      margin-left: 30%;
      margin-right: 30%;
      margin-top: 5%;
      margin-bottom: 5%;
      padding: 10px;
      border: 1px solid;
      text-align: center;
    }

    .crud_vendor input[type="text"] {
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      outline: none;
    }

    .crud_vendor input[type="submit"] {
      width: 25%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .crud_vendor input[type="submit"]:hover {
      background-color: #45a049;
    }

    .crud_vendor input[type="submit"]:hover {
      background-color: #45a049;
    }

    .crud_vendor {
      border-radius: 5px;
      background-color: #f2f2f2;
    }
    .crud_vendor h1 {
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


  <form name="add_vendor" id="add_vendor" onsubmit="return vencheck(); return false" method="POST">

    <div class="crud_vendor">
      <h1>Add Vendor</h1>

      <label for="vendor_id">ID:</label>
      <input type="text" id="vendor_id" name="vendor_id" placeholder="Vendor ID"><p  style="color: red;"id="viderr"></p><br>

      <label for="vendor_name">Name:</label>
      <input type="text" id="vendor_name" name="vendor_name" placeholder="Vendor Name"><p  style="color: red;"id="nameerr"></p><br>

      <label for="vendor_email">Email Address:</label>
      <input type="text" id="vendor_email" name="vendor_email" placeholder="Vendor Email"><p  style="color: red;"id="emailerr"></p><br>

      <label for="vendor_phone">Phone Number:</label>
      <input type="text" id="vendor_phone" name="vendor_phone" placeholder="Vendor Phone NO."><p  style="color: red;"id="phnerr"></p><br>

      <label for="vendor_address">Address:</label>
      <input type="text" id="vendor_address" name="vendor_address" placeholder="Vendor Address"><p  style="color: red;"id="addresserr"></p><br>

      <label for="vendor_pass">Password:</label>
      <input type="text" id="vendor_pass" name="vendor_pass" placeholder="Vendor Password"><p  style="color: red;"id="passerr"></p><br>
      <input type="submit" name="btn_vendor_add" id="btn_vendor_add" value="Add Vendor">
    </div>

  </form>







  <?php
  include("../controller/db/conn.php");


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    // insert start
    // select or read data start
    // $sql = "SELECT vendorId, vendorName, vendorEmail, vendorPhone, vendorAdrs FROM vendor";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //   echo "<table><tr> <th>Vendor_ID</th> <th>Vendor_Name</th> <th>Vendor_Email</th> <th>Vendor_Phone</th> <th>vendor_Address</th></tr>";
    //   // output data of each row
    //   while ($row = $result->fetch_assoc()) {
    //     echo "<tr > 
    //       <td >" . $row["vendorId"] . "</td> 
    //        <td>" . $row["vendorName"] . "</td>
    //        <td>" . $row["vendorEmail"] . "</td>
    //        <td>" . $row["vendorPhone"] . "</td>
    //        <td>" . $row["vendorAdrs"] . "</td>


    //       </tr>";
    //   }
    //   echo "</table>";
    // } else {
    //   echo "0 results";
    // }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['btn_vendor_add'])){
       
        $vendor_id = $_POST['vendor_id'];
        $vendor_name = $_POST['vendor_name'];
        $vendor_email = $_POST['vendor_email'];
        $vendor_phone = $_POST['vendor_phone'];
        $vendor_address = $_POST['vendor_address'];
        $vendor_pass = $_POST['vendor_pass'];

        $sql = "INSERT INTO loginInfo (id, passwords, roles)
        VALUES ('$vendor_id', '$vendor_pass', 'vendor')";

        $sql2 = "INSERT INTO vendor (vendorId, vendorName, vendorEmail, vendorPhone, vendorAdrs, vendorPassword)
        VALUES ('$vendor_id', '$vendor_name', '$vendor_email', '$vendor_phone', '$vendor_address', '$vendor_pass')";
    
        if ($conn->query($sql) === TRUE) {
          //echo "Record deleted successfully";
          header("Location: admin_vendor_list.php");
        
        } else {
          //echo "Error deleting record: " . $conn->error;
        }
        if ($conn->query($sql2) === TRUE) {
          //echo "Record deleted successfully";
          header("Location: admin_vendor_list.php");
        
        } else {
         // echo "Error deleting record: " . $conn->error;
        }
    
      }
  }
}

  $conn->close();

  ?>



  <p style="margin-bottom: 3rem;"></p>

  <script src="../controller/vendor_check.js"></script>


</body>

</html>


<?php
include("footer.php");
?>