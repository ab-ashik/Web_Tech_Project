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
<link rel="stylesheet" href="../view/css/vendor_index.css">
  <title></title>
  <style>
table, th, td {
  border: 1px solid;
  text-align: center;
}

table {
  width: 100%;
  margin-bottom: 31rem;
}

th {
  background-color:cornflowerblue;
}
tr:nth-child(even) {background-color:lightblue;}
tr:nth-child(odd) {background-color:cornsilk;}

</style>
</head>
<body>



<header>
        <a href="" class="logo">Alpha Event Management</a>

        <ul class="navbar">
            <li><a href="index_vendor.php">Home</a></li>
            <li><a href="event_list.php">Event List</a></li>
            <li><a href="add_event.php">Add/Update Event</a></li>
            <li><a href="recent_orders.php">Recent Orders</a></li>
            <li><a href="showReviews.php">Show Reviews</a></li>
        </ul>

        <div class="nav_btn" id="underline">
        <a href="#">[<?php echo $loginId ?>]</a>
        <a href="../controller/logout.php">Log Out</a>
        
        </div>
</header>

<form name="recent_orders" action="" method="POST">


</form>

<p style="text-align: center;background-color:coral;margin-top: 3rem;margin-bottom: 3rem;font-size:35px;font-weight:bolder;letter-spacing:5px;">Recent Orders For You</p>




<?php
include("../controller/db/conn.php");
 // select or read data start
$sql = "SELECT accId, accName, accAdrs, eventType, payment FROM account where vendorName='$loginId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr> <th>Account_ID</th> <th>Name</th> <th>Address</th> <th>Event Type</th> <th>Payment</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr > 
        <td >" . $row["accId"]. "</td> 
         <td>" . $row["accName"]. "</td>
         <td>" . $row["accAdrs"]. "</td>
         <td>" . $row["eventType"]. "</td>
         <td>" . $row["payment"]. "</td>



        </tr>";

    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

?>


<p style="margin-bottom: 3rem;"></p>
</body>
</html>


<?php
include("footer.php");
?>