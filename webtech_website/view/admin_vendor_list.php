<?php
session_start();

// $loginId=$_REQUEST["loginId"];
// $role=$_REQUEST["role"];

$loginId=$_SESSION["loginId"];
$role=$_SESSION["role"];

if(!isset($_COOKIE['status'])){
    header('location: ../Model/login.php');
}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../view/css/admin_index.css">
  <title></title>
  <style>
table, th, td {
  border: 1px solid;
  text-align: center;
}

table {
  width: 100%;
  margin-bottom: 27rem;
}
th {
  background-color:cornflowerblue;
}
tr:nth-child(even) {background-color:lightblue;}
tr:nth-child(odd) {background-color:cornsilk;}

.del_vendor{
  background-color: red;
  color: white;
  border: 1px solid;
  border-radius: 5px;
  padding: 10px;
  text-decoration: none;
  text-align: center;
  margin-bottom: 2rem;
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

<form name="vendor_list" action="" method="POST">


</form>

<p style="text-align: center;background-color:coral;margin-top: 3rem;margin-bottom: 3rem;font-size:35px;font-weight:bolder;letter-spacing:5px;">Vendor List</p>

<div class="del_vendor">
<form action="" method="POST" onsubmit="return del_chek(); return false">
<label>Delete Vendor Using vendor's ID :</label>
<input type="text" name="del_vendor" id="del_vendor" >
<input type="submit" name="del_vendor_btn" id="del_vendor_btn" value="Delete Vendor">
</form>
</div>



<?php
include("../controller/db/conn.php");
 // select or read data start
$sql = "SELECT vendorId, vendorName, vendorEmail, vendorPhone, vendorAdrs FROM vendor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr> <th>Vendor_ID</th> <th>Vendor_Name</th> <th>Vendor_Email</th> <th>Vendor_Phone</th> <th>Vendor_Address</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr > 
        <td >" . $row["vendorId"]. "</td> 
         <td>" . $row["vendorName"]. "</td>
         <td>" . $row["vendorEmail"]. "</td>
         <td>" . $row["vendorPhone"]. "</td>
         <td>" . $row["vendorAdrs"]. "</td>


        </tr>";

    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

?>

<?php
include("../controller/db/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['del_vendor_btn'])){
    $vendor_id = $_POST['del_vendor'];
    $sql = "DELETE FROM logininfo WHERE id='$vendor_id'";
    $sql2 = "DELETE FROM vendor WHERE vendorId='$vendor_id'";

    if ($conn->query($sql2) === TRUE) {
      //echo "Record deleted successfully";
      header("Location: admin_vendor_list.php");
    
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    if ($conn->query($sql) === TRUE) {
      //echo "Record deleted successfully";
      header("Location: admin_vendor_list.php");
    
    } else {
      echo "Error deleting record: " . $conn->error;
    }

  }
}

$conn->close();
    
?>

<p style="margin-bottom: 3rem;"></p>



<script >
  var userid_expression = /^[a-zA-Z0-9]+$/;
function del_chek(){
  var del_vendor = document.getElementById('del_vendor').value;
  if(del_vendor == ""){
    alert("Please Enter Vendor ID");
    return false;
  }
  else if(del_vendor.length < 3){
    alert("Vendor ID must be 3 characters long");
    return false;
  }
  else if(!del_vendor.match(userid_expression)){
    alert("Vendor ID must be alphanumeric");
    return false;
  }
  else{
    return true;
  }
}
</script>
</body>
</html>


<?php
include("footer.php");
?>