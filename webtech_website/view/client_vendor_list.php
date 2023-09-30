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
<link rel="stylesheet" href="../view/css/client_index.css">
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
            <li><a href="index_client.php">Home</a></li>
            <li><a href="client_event_list.php">Event List</a></li>
            <li><a href="client_vendor_list.php">View All Vendors</a></li>
            <li><a href="AddRevForm.php">Give Review</a></li>
        </ul>


        <div class="nav_btn" id="underline">
        <a href="#">[<?php echo $loginId ?>]</a>
        <a href="../controller/logout.php">Log Out</a>
        
        </div>
</header>

<form name="vendor_list" action="" method="POST">


</form>

<p style="text-align: center;background-color:coral;margin-top: 3rem;margin-bottom: 3rem;font-size:35px;font-weight:bolder;letter-spacing:5px;">Vendor List</p>




<?php
include("../controller/db/conn.php");
 // select or read data start
$sql = "SELECT vendorName, vendorEmail, vendorPhone, vendorAdrs FROM vendor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr> <th>Vendor_Name</th> <th>Vendor_Email</th> <th>Vendor_Phone</th> <th>Vendor_Address</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr > 
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

<p style="margin-bottom: 3rem;"></p>
</body>
</html>


<?php
include("footer.php");
?>