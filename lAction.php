<?php
session_start();
if (isset($_POST['login'])) {

    include 'config.php';

    $log_username = $_POST['l_username'];
    $log_password = $_POST['l_password'];

    if ($log_username === 'admin' && $log_password === 'admin') {
        session_start();
        $_SESSION['username'] = $log_username;
        echo "<script>location.href='adminHome.php'</script>";
    } else {
        // authCheck_query
        $result = mysqli_query($conn, "SELECT * FROM `regaccounts` 
            WHERE username = '$log_username' AND BINARY pass = '$log_password'");
        if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION['username'] = $log_username;
            echo "<script>location.href='home.php'</script>";
        } else {
            $result1 = mysqli_query($conn, "SELECT * FROM `accounts` 
                WHERE username = '$log_username' AND BINARY pass = '$log_password' AND verifystatus = '0'");
            if (mysqli_num_rows($result1) > 0) {
                $_SESSION['header'] = "Email Has Not Been Verified";
                $_SESSION['para'] = "Verification link has been sent already!!";
                echo "<script>location.href='index.php'</script>";
            } else {
                $result2 = mysqli_query($conn, "SELECT * FROM accounts WHERE username = '$log_username' AND BINARY pass = '$log_password'");
                if (mysqli_num_rows($result2) > 0) {
                    $_SESSION['header'] = "Account has not been Approved";
                    $_SESSION['para'] = "Please Wait For An Admin to Approve your Account!!";
                    echo "<script>location.href='index.php'</script>";
                }
            }
        }
    }

} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='index.php'</script>";
}

?>