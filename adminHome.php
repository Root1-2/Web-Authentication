<?php

session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Not Accessible!')</script>";
    echo "<script>location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- <nav class="p-3 text-bg-dark navbar navbar-expand-md fixed-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-outline-success">Sign-up</button>
                </div>
            </div>
        </div>
    </nav> -->

    <h1 class="text-center m-2 pt-5">Welcome To Admin Home,</h1>
    <h2 class="text-center text-info mb-5">
        <?php echo $_SESSION['username']; ?>
    </h2>

    <div class="d-flex row justify-content-center container-fluid">
        <div class="border border-secondary col-lg-5 col-md-12 col-sm-12 rounded m-4">
            <h3>List of All Unregistered Account</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">ID</th>
                        <th scope="col" style="width: 25%;">Username</th>
                        <th scope="col" style="width: 20%;">Status</th>
                        <th scope="col" style="width: 20%;">Approve Column</th>
                        <th scope="col" style="width: 20%;">Reject Column</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'config.php';

                    $unregistered = mysqli_query($conn, "SELECT * FROM `accounts` WHERE verifystatus = '1'");
                    while ($row = mysqli_fetch_array($unregistered)) {
                        echo
                            "<tr>
                            <th scope='row'>" . $row['id'] . "</th>
                            <td>" . $row['username'] . "</td>
                            <td>Unregistered</td>
                            <td><a href='approveAction.php?id=" . $row['id'] . "'><button class='btn btn-outline-success'>Approve</button></a></td>
                            <td><a href='rejectAction.php?id=" . $row['id'] . "'><button class='btn btn-outline-warning'>Reject</button></a></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="border border-secondary col-lg-5 col-md-12 col-sm-12 rounded m-4">
            <h3>List of All Registered Account</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">ID</th>
                        <th scope="col" style="width: 15%;">Username</th>
                        <th scope="col" style="width: 15%;">Fullname</th>
                        <th scope="col" style="width: 20%;">Status</th>
                        <th scope="col" style="width: 20%;">Approved Time</th>
                        <th scope="col" style="width: 20%;">Delete Account</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'config.php';

                    $unregistered = mysqli_query($conn, "SELECT * FROM `regAccounts`");
                    while ($row = mysqli_fetch_array($unregistered)) {
                        echo
                            "<tr>
                            <th scope='row'>" . $row['id'] . "</th>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['fullname'] . "</td>
                            <td>Registered</td>
                            <td>" . $row['approvedTime'] . "</td>
                            <td><button class='btn btn-outline-warning'>Delete</button></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br><br><br><br>
    <a href=" logout.php" style="text-decoration: none;"><button
            class="d-flex mx-auto btn btn-outline-danger">Logout</button></a>

    <br><br><br><br><br><br><br><br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>