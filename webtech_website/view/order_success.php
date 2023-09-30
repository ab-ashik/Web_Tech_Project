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
    <link rel="stylesheet" href="../view/css/client_index.css">
    <title>Document</title>

    <style>
        .order_text{
            margin: 0 auto;
            width: 50%;
            padding: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .order_text p{
            text-align: center;
            font-size: 20px;
        }

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



        <div class="order_text" style="text-align: center; font-size:xx-large">
            <p >Order Success............</p>
            <p >Thank you for your order. We will contact you soon....................</p>
        </div>
</header>



</body>
</html>


<?php
include("footer.php");
?>