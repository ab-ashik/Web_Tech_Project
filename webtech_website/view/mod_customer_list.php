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
<link rel="stylesheet" href="../view/css/moderator_index.css">
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
            <li><a href="index_moderator.php">Home</a></li>
            <li><a href="mod_vendor_list.php">Vendors List</a></li>
            <li><a href="mod_customer_list.php">Customers List</a></li>
            <li><a href="mod_showOrders.php">Orders</a></li>
            <li><a href="mod_event_list.php">Events</a></li>
            <li><a href="mod_showReviews.php">View Reviews</a></li>

        </ul>

        <div class="nav_btn" id="underline">
        <a href="#">[<?php echo $loginId ?>]</a>
        <a href="../controller/logout.php">Log Out</a>
        
        </div>
</header>

<form name="vendor_list" action="" method="POST">


</form>

<p style="text-align: center;background-color:coral;margin-top: 3rem;margin-bottom: 3rem;font-size:35px;font-weight:bolder;letter-spacing:5px;">Customer List</p>

<!-- <div class="del_vendor">
<form action="" method="POST" onsubmit="return del_chek(); return false">
<label>Delete Vendor Using vendor's ID :</label>
<input type="text" name="del_vendor" id="del_vendor" >
<input type="submit" name="del_vendor_btn" id="del_vendor_btn" value="Delete Vendor">
</form>
</div> -->



<?php
include("../controller/db/conn.php");
 // select or read data start
$sql = "SELECT clientId, clientName, clientEmail, clientPhone, clientAdrs FROM client";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr> <th>Client_ID</th> <th>Client_Name</th> <th>Client_Email</th> <th>Client_Phone</th> <th>Client_Address</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr > 
        <td >" . $row["clientId"]. "</td> 
         <td>" . $row["clientName"]. "</td>
         <td>" . $row["clientEmail"]. "</td>
         <td>" . $row["clientPhone"]. "</td>
         <td>" . $row["clientAdrs"]. "</td>


        </tr>";

    }
    echo "</table>";
} else {
    echo "Customer List is Empty";
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