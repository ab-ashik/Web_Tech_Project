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
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 500px;
  height: 500px;
  perspective: 1000px;
  margin-left: 45rem;
  margin-bottom: 5rem;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
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
</header>

<div class="body">
    <h1 style="text-align:center; padding:3rem;">Welcome, <?php echo $loginId ?> as <?php echo $role ?> role</h1>

    <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="../model/admin_profile.jpg" alt="Avatar" style="width:500px;height:500px;">
    </div>
    <div class="flip-card-back">
      <h1>ID : <?php echo $loginId ?></h1> 
      <p>ROLE : <?php echo $role ?></p> 

    </div>
  </div>
</div>

</div>






</body>
</html>

<?php



?>

<?php
include("footer.php");
?>