<?php

$ID = $_GET['id'];
if (isset($ID)) {
    include 'config.php';
    $ID = $_GET['id'];
    $idselect = mysqli_query($conn, "SELECT * FROM `accounts` WHERE id = '$ID'");
    $row = mysqli_fetch_assoc($idselect);

    // echo $row['id'];
    // echo $row['fullname'];
    // echo $row['username'];
    // echo $row['email'];
    // echo $row['pass'];
    $insert_query = "INSERT INTO `regAccounts`(`fullname`,`username`,`email`,`pass`) VALUES
         ('{$row['fullname']}','{$row['username']}','{$row['email']}','{$row['pass']}')";

    if (!mysqli_query($conn, $insert_query)) {
        die("Not Inserted!!");
    } else {
        $deleteQuery = "DELETE FROM `accounts` WHERE id = '$ID'";
        mysqli_query($conn, $deleteQuery);
        echo "<script>alert('Account Registered Successfully!')</script>";
        echo "<script>location.href='index.php'</script>";
    }
} else {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='index.php'</script>";
}

?>