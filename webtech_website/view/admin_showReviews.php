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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/admin_index.css">
    <title>Document</title>

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

<form name="show_reviews" action="" method="POST">


</form>

<p style="text-align: center;background-color:coral;margin-top: 3rem;margin-bottom: 3rem;font-size:35px;font-weight:bolder;letter-spacing:5px;">Recent Posted Reviews of Customers</p>




<?php
include("../controller/db/conn.php");

// $sql2 = "SELECT vendorName FROM vendor where vendorId='$loginId'";
// $result2 = $conn->query($sql2);
// if($result2->num_rows > 0)
// {
//     while($row2 = $result2->fetch_assoc())
//     {
//         $vendorName = $row2["vendorName"];
//     }
// }

$sql = "SELECT id, name, review FROM review";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr> <th>Customer Name</th> <th>Review</th> <th>Vendor Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr > 
        <td >" . $row["name"]. "</td> 
         <td>" . $row["review"]. "</td>
         <td>" . $row["id"]. "</td>




        </tr>";

    }
    echo "</table>";
} else {
    echo "<p style='text-align:center;font-size:25px;font-weight:bolder; color:red;'>No Reviews Found</p> ";
}

$conn->close();

?>


</body>
</html>

<?php



?>

<?php
include("footer.php");
?>