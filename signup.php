<?php
$signupSuccess = 0;
$userExist = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sqlQuery = "Select * from `registration` where username ='$username'";

    $queryResult = mysqli_query($con, $sqlQuery);
    if ($sqlQuery) {
        $rowNumber = mysqli_num_rows($queryResult);
        if ($rowNumber > 0) {
            $userExist = 1;
        } else {
            $sqlQuery = "insert into `registration`(username, password) values('$username', '$password')";
            $queryResult = mysqli_query($con, $sqlQuery);
        }
        if ($queryResult) {
            // echo 'Signup successful.';
            $signupSuccess = 1;
        } else {
            die(mysqli_error($con));
        }
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Signup page</title>
</head>

<body>
    <?php
    if ($userExist) {
        echo '<div class="alert alert-danger text-center" role="alert">
  Username already exists.
</div>';
    } elseif ($signupSuccess) {
        echo '<div class="alert alert-success text-center" role="alert">
  Signup successful.
</div>';
    }
    ?>

    <h1 class="text-center mt-5">Signup page</h1>
    <div class="container mt-5 ">
        <form action="signup.php" method="post">
            <div class="form-group text-center">
                <label>Username</label>
                <input type="text" class="form-control text-center mt-3" placeholder="Enter your username"
                    name="username">
            </div>
            <br />
            <div class="form-group text-center">
                <label>Password</label>
                <input type="password" class="form-control text-center mt-3" placeholder="Enter your password"
                    name="password">
            </div>
            <br />
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            <div class="form-group text-center mt-5">
                <label>Already have an account? Log in!</label>
                <a href="login.php" class="btn btn-primary w-100">Go to login page</a>
            </div>

        </form>
    </div>
</body>

</html>