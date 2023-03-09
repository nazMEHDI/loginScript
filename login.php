<?php
session_start();
include("dbConnection.php");
// Check if the user has submitted the form
if(isset($_POST['submit'])){
    // Get the values from the form
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $activation = isset($_POST['activationCode']) ? $_POST['activationCode'] : "";
    //check if password from the admin or not
    if ($password == "admin") {
        // do nothing
    } else {
    $password = sha1($password);
    }

    // $activationQuery = "SELECT * FROM users1 WHERE activationCode='$activation'";
    // $resultActivation = mysqli_query($conn,$activationQuery);

    // if (mysqli_num_rows($resultActivation) != 0) {
    //     $updatQuery = "UPDATE users1 SET status='active' WHERE username='$username'";
    //     mysqli_query($conn, $updatQuery);
    // } else {
    //     $error .= "your acount not activited<br>";
    // }

    // Create the query
    $query = "SELECT * FROM users1 WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    // Check if the query returned a valid result
    if (mysqli_num_rows($result) == 0) { 
        $error .= "Username or Password incorrect<br>";
        header("location: index.php?error=$error");
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $status = $row["status"];
            if ($status == "active") {
                $_SESSION['username'] = $username;
                $suc .= "Connected Successfully";
                header("location: homePage.php?success=$success&username=$username");
            } else {
                $error .= "Account is deactivated or not yet activated<br>";
                header("location: index.php?err=$error");
            }
        }      
        
    }
}
?>