<?php
session_start();

include 'config.php';

// echo $_GET['token'];
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = mysqli_query($conn, "SELECT * FROM accounts WHERE verifytoken = '$token'");
    if (mysqli_num_rows($verify_query) > 0) {
        $row = mysqli_fetch_assoc($verify_query);
        // echo $row['verifytoken'];
        if ($row['verifystatus'] == 0) {
            $update_query = mysqli_query($conn, "UPDATE accounts SET verifystatus = '1' WHERE verifytoken = '{$row['verifytoken']}'");

            if ($update_query) {
                $_SESSION['header'] = "Account Has Been Verified Successfully!!!";
                $_SESSION['para'] = "Please wait for an admin to approve your account...";
                header("Location: login.php");
            } else {
                $_SESSION['header'] = "Verification Failed!!!";
                $_SESSION['para'] = "Please Try Again...";
                header("Location: login.php");
            }

        } else {
            $_SESSION['header'] = "Email Already Verified!!!";
            $_SESSION['para'] = "Please Login...";
            header("Location: login.php");
        }

    } else {
        $_SESSION['header'] = "This Token Does Not Exist!!!";
        $_SESSION['para'] = "Please Try Again...";
        header("Location: login.php");
    }

} else {
    $_SESSION['header'] = "Not Allowed!!!";
    $_SESSION['para'] = "Please Try Again...";
    header("Location: login.php");
}

?>