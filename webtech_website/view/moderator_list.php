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

.del_mod{
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



<p style="text-align: center;background-color:cornflowerblue;margin-top: 3rem;margin-bottom: 3rem;font-size:35px;font-weight:bolder;letter-spacing:5px;">Moderator List</p>

<div class="del_mod">
<form action="" method="POST" onsubmit="return del_chekc(); return false;">
<label>Delete Moderator Using moderator's ID :</label>
<input type="text" name="del_mod" id="del_mod">
<input type="submit" name="del_mod_btn" id="del_mod_btn" value="Delete Moderator">
</form>
</div>



<?php
include("../controller/db/conn.php");
 // select or read data start
$sql = "SELECT mdId, mdName, mdEmail, mdPhone, mdAdrs, mdPassword FROM moderator";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr> <th>Moderator_ID</th> <th>Moderator_Name</th> <th>Moderator_Email</th> <th>Moderator_Phone</th> <th>Moderator_Address</th> <th>Moderator_Address</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr > 
        <td >" . $row["mdId"]. "</td> 
         <td>" . $row["mdName"]. "</td>
         <td>" . $row["mdEmail"]. "</td>
         <td>" . $row["mdPhone"]. "</td>
         <td>" . $row["mdAdrs"]. "</td>
         <td>" . $row["mdPassword"]. "</td>


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
  if(isset($_POST['del_mod_btn'])){
    $mod_id = $_POST['del_mod'];
    $sql = "DELETE FROM logininfo WHERE id='$mod_id'";
    $sql2 = "DELETE FROM moderator WHERE mdId='$mod_id'";

    if ($conn->query($sql2) === TRUE) {
      //echo "Record deleted successfully";
      header("Location: moderator_list.php");
    
    } else {
      echo "Error deleting record: " . $conn->error;
    }
    if ($conn->query($sql) === TRUE) {
      //echo "Record deleted successfully";
      header("Location: moderator_list.php");
    
    } else {
        echo "Error deleting record: " . $conn->error;
    }

  }
}

$conn->close();
    
?>

<p style="margin-bottom: 3rem;"></p>



<script>

var userid_expression = /^[a-zA-Z0-9]+$/;
function del_chekc(){
  var del_mod = document.getElementById('del_mod').value;
  if(del_mod == ""){
    alert("Please Enter Moderator ID");
    return false;
  }
  else if(del_mod.length < 3){
    alert("Moderator ID must be 3 characters long");
    return false;
  }
  else if(!del_mod.match(userid_expression)){
    alert("Moderator ID must be alphanumeric");
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