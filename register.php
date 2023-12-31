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
    <h1 class="m-5 text-center">Create An Account</h1>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="border border-secondary rounded col-lg-4 col-md-10 col-sm-12 p-0">
                <form action="rAction.php" method="post">
                    <h3 class="bg-primary text-dark rounded p-2 text-center">Register Form</h3>
                    <div class="col-lg-8 m-4">
                        <input type="text" class="form-control" name="r_fullname" placeholder="Fullname" required>
                    </div>
                    <div class="col-lg-8 m-4">
                        <input type="text" class="form-control" name="r_username" placeholder="Username" required>
                    </div>
                    <div class="col-lg-8 m-4">
                        <input type="email" class="form-control" name="r_email" placeholder="Email" required>
                    </div>
                    <div class="col-lg-8 m-4">
                        <input type="password" class="form-control" name="r_password" placeholder="Password" required>
                    </div>
                    <div class="col-lg-8 m-4">
                        <input type="password" class="form-control" name="r_conpassword" placeholder="Confirm Password" required>
                    </div>
                    <button name="register" class="d-flex mx-auto m-2 btn btn-outline-success">Create</button>

                    <div class="m-4">
                        <span>Already Registered?</span>
                        <a href="index.php"><span>Click Here</span></a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>












<!-- <!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <h1>Meow</h1>
</body>
</html> -->