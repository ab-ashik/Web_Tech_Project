<?php
include("conn.php");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
else{

    


        if (isset($_POST['submit'])) {
        $loginid = $_POST['loginId'];
        $loginpass = $_POST['loginPass'];

        if($loginid == "admin" && $loginpass == "12345")
        {
             session_start();
            $_SESSION['loginId'] = $loginid;
            $_SESSION['role'] = "admin";
            //cookies
            setcookie('status', 'true', time() + (86400 * 30), '/');


            header("Location: ../../view/index_admin.php");
            echo "Login Successful as admin</br>";
        }
        else {
                 // sql to delete a record
        //$sql = "DELETE FROM table1 WHERE id= $uid";
        $sql = "SELECT id, passwords, roles FROM logininfo WHERE id = '$loginid'";
        $result = $conn->query($sql);
        // if ($conn->query($sql) === TRUE) {
        //   echo "Record deleted successfully";
        // } else {
        //   echo "Error deleting record: " . $conn->error;
        // }

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $id = $row['id'];
                $pass = $row['passwords'];
                $role = $row['roles'];
            }
            if($id == $_POST['loginId'] && $pass == $_POST['loginPass'] && $role == "client")
            {

                // session_start();
                //  $_SESSION['loginId'] = $id;
                //   $_SESSION['role'] = $role;
                //   //cookies
                //  setcookie("loginId", $loginid, time() + (86400 * 30), "/");
                // header("Location: ../../view/home.php");
                // echo "Login Successful</br>";
                // echo $id;
                // echo $role;

                session_start();
                $_SESSION['loginId'] = $id;
                $_SESSION['role'] = $role;
                //cookies
                setcookie('status', 'true', time() + (86400 * 30), '/');
    
    
                header("Location: ../../view/index_client.php");
                echo "Login Successful as admin</br>";
                echo $id;
                echo $role;
                
            }
            else if($id == $_POST['loginId'] && $pass == $_POST['loginPass'] && $role == "vendor")
            {
                session_start();
                $_SESSION['loginId'] = $id;
                $_SESSION['role'] = $role;
                //cookies
                setcookie('status', 'true', time() + (86400 * 30), '/');
                header("Location: ../../view/index_vendor.php");
                echo "Login Successful</br>";

                
            }
            else if($id == $_POST['loginId'] && $pass == $_POST['loginPass'] && $role == "moderator")
            {
                session_start();
                $_SESSION['loginId'] = $id;
                $_SESSION['role'] = $role;
                //cookies
                setcookie('status', 'true', time() + (86400 * 30), '/');
                header("Location: ../../view/index_moderator.php");
                echo "Login Successful</br>";
                
            }
            else
            {
            echo "Wrong Username or Password";
            }
            
        }
        else
        {
            echo "You are not registered yet. Please register first";
        }
        }

        }
             

  

        $conn->close();
 }

?>