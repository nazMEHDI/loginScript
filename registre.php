<?php 
session_start();
    include("dbConnection.php");
    include("functions.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.PHP';


// Check if the user has submitted the form
if(isset($_POST['submit'])){
    // Get the values from the form
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $email= isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : "";

    // Validate Email
    if(!domain_exists($email)) { 
        $error .="Your adresse email is not supported";
        header("location: index.php?error=$error");
    } else {
    // Validate the form data
    if(empty($password) || empty($password_confirm) || empty($username) || empty($email)){
        echo "Please fill out all fields.";
    } else if($password != $password_confirm){
        $error .= "passwords don't match<br>";
        header("location: index.php?error=$error");
    } else {
        // Check if the username is already in use
        $query = "SELECT * FROM users1 WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $error .= "username already in use<br>";
            header("location: index.php?error=$error");
        } elseif (strlen($password) < 8) {
            $error .="password must be at least 8 characters";
            header("location: index.php?error=$error");
        } else {
            // // Hash the password
            $password = sha1($password);
            $activationCode = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
            // Insert the new user into the database
            $query = "INSERT INTO users1 VALUES (null, '$username', '$email', '$password', 'user', 'passive','$activationCode')";
            $result = mysqli_query($conn, $query);

            if($result){
                // Register success and creat session
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;

                //Gnarate Ctivation Code
                // $activationCode = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
                $activatioCodeTxt = "Activation Code";
                $activatioCodeMessage = "Hi " . $username . " This Your Activation Code : " . $activationCode;

                //Send Avtivation Code
                // if (isset($_POST["send"])) {
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->Host = 'ssl://smtp.gmail.com'; //Host = 'smtp.gamil.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'lechhabcompany@gmail.com'; // my gmail
                    $mail->Password = 'hllnxzaqpcrrcnfv'; // my gmail App Password
                    $mail->SMTPSecure = "ssl";
                    $mail->Port = 465;
                
                    $mail->setFrom('lechhabcompany@gmail.com');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = $activatioCodeTxt;
                    $mail->Body = $activatioCodeMessage;
                    $mail->send();

                $suc .= "Account registred successfully Check your Eamil for Active your Acount<br>";
                header("location: index.php?suc=$suc");
            } else { 
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
}




?>