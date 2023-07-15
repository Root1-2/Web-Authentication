<?php
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
        $result = mysqli_query($conn, "SELECT * FROM `accounts` 
            WHERE username = '$log_username' AND BINARY pass = '$log_password'");
        if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION['username'] = $log_username;
            echo "<script>location.href='home.php'</script>";
        } else {
            echo "<script>alert('Invalid Username & Password')</script>";
            echo "<script>location.href='index.php'</script>";
        }
    }

} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='index.php'</script>";
}

?>