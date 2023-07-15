<?php

$ID = $_GET['id'];
if (isset($ID)) {
    include 'config.php';

    $deleteQuery = "DELETE FROM `accounts` WHERE id = '$ID'";
    if (!mysqli_query($conn, $deleteQuery)) {
        die("Not Rejected");
    } else {
        echo "<script>alert('Rejected!')</script>";
        echo "<script>location.href='index.php'</script>";
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='index.php'</script>";
}

?>