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
  margin-bottom: 30rem;
}

th {
  background-color:cornflowerblue;
}
tr:nth-child(even) {background-color:lightblue;}
tr:nth-child(odd) {background-color:cornsilk;}

#myInput{
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  outline: none;
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

<form name="recent_orders" action="" method="POST">


</form>

<p style="text-align: center;background-color:coral;margin-top: 3rem;margin-bottom: 3rem;font-size:35px;font-weight:bolder;letter-spacing:5px;">Recent Placed Orders</p>

<label style="font-size: x-large; margin-left:9%; color:crimson;">Search The Table Using any Colum Value :</label>  
<input id="myInput" type="text" placeholder="Search..">


<?php
include("../controller/db/conn.php");
 // select or read data start
$sql = "SELECT purchase_no, accId, accName, accAdrs, eventType, payment, vendorName FROM account";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr> <th>Purchase_NO</th> <th>Account_ID</th> <th>ACC_Name</th> <th>ACC_Address</th> <th>Event Type</th> <th>Payment</th> <th>Vendor Name</th></tr>";
    echo "<tbody id='myTable'>";
    while($row = $result->fetch_assoc()) {
        echo "<tr >
        <td >" . $row["purchase_no"]. "</td>
        <td >" . $row["accId"]. "</td> 
         <td>" . $row["accName"]. "</td>
         <td>" . $row["accAdrs"]. "</td>
         <td>" . $row["eventType"]. "</td>
         <td>" . $row["payment"]. "</td>
         <td>" . $row["vendorName"]. "</td>



        </tr>";

    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

?>


<p style="margin-bottom: 3rem;"></p>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


</body>
</html>


<?php
include("footer.php");
?>