<?php
session_start();
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function sendemail($reg_fullName, $reg_email, $verify_token)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->SMTPAuth = true; //Enable SMTP authentication

    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->Username = 'abdullahalmasrur8@gmail.com'; //SMTP username
    $mail->Password = 'mlyysylpgltqmday'; //SMTP password

    $mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', $reg_fullName);
    $mail->addAddress($reg_email); //Add a recipient

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'EMAIL Verfification';
    $email_template = "
        <h2>You have create an account successfully</h2>
        <h4>Verify your email address using the below given Link</h4>
        <br><br>
        <a href='http://localhost/Auth/verifyemail.php?token=$verify_token'>Verification Link</a>
    ";
    $mail->Body = $email_template;

    $mail->send();
    // echo 'Message has been sent';
}

if (isset($_POST['register'])) {

    $reg_fullName = $_POST['r_fullname'];
    $reg_userName = $_POST['r_username'];
    $reg_email = $_POST['r_email'];
    $reg_password = $_POST['r_password'];
    $reg_conpassword = $_POST['r_conpassword'];
    $verify_token = md5(rand());

    $userName_pattern = "/^(?=.*[a-z])(?=.*\d)[a-z\d!@#$%^&*_\-]{5,10}$/";
    $email_pattern = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
    $pass_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,15}$/";

    $insert_query = "INSERT INTO `accounts`(`fullname`,`username`,`email`,`pass`,`verifyToken`) VALUES
     ('$reg_fullName','$reg_userName','$reg_email','$reg_password','$verify_token')";

    $dupe_userName = mysqli_query($conn, "SELECT * FROM `accounts` WHERE userName = '$reg_userName'");
    $dupe_email = mysqli_query($conn, "SELECT * FROM `accounts` WHERE email = '$reg_email'");

    if (!preg_match($userName_pattern, $reg_userName)) { //userName Match
        echo "<script>alert('Invalid Username. Requirement: Minimum 1 lowercase letter and 1 digits. 
            No uppercase letter. Length between 5-10.')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (!preg_match($email_pattern, $reg_email)) { //Email Match
        echo "<script>alert('Invalid Email. Please Try Again..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (!preg_match($pass_pattern, $reg_password)) { //Password check
        echo "<script>alert('Invalid Password. Requirement: Must contain at least one lowercase letter, 
            at least one uppercase letter, at least one digit & length between 6 and 15 characters long')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if ($reg_password !== $reg_conpassword) { //confirm password check
        echo "<script>alert('Password & Confirm Password do not match..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (mysqli_num_rows($dupe_userName) > 0) { //duplicate username check from db
        echo "<script>alert('This Username is already taken..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (mysqli_num_rows($dupe_email) > 0) { //duplicate email check from db
        echo "<script>alert('This email is already taken..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else {
        if (!mysqli_query($conn, $insert_query)) {
            die("Not Inserted!!");
        } else {
            sendemail("$reg_fullName", "$reg_email", "$verify_token");
            $_SESSION['header'] = "Registration Successful";
            $_SESSION['para'] = "Verify Your Email Address!!";
            echo "<script>location.href='index.php'</script>";
        }
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='index.php'</script>";
}

?>