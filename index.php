<?php

session_start();
if(isset($_SESSION['username'])) {
    if($_SESSION['username'] == 'admin') {
        echo "<script>location.href='adminHome.php'</script>";
    } else {
        echo "<script>location.href='home.php'</script>";
    }
} else {
    echo "<script>location.href='login.php'</script>";
}

?>