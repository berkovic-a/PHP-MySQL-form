<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Welcome page</title>
</head>

<body>
    <!-- <?php
            if ($credentials == 1) {
                echo '<div class="alert alert-success text-center" role="alert">
  Login successful.
</div>';
            } elseif ($credentials == 2) {
                echo '<div class="alert alert-danger text-center" role="alert">
Incorect login credentials.
</div>';
            }
            ?>  -->

    <h1>
        <div class="alert alert-primary text-center" role="alert">
            <?php echo 'Welcome ' . $_SESSION['username'] . '!'; ?>
        </div>
    </h1>
    <div class="container">
        <a href="logout.php" class="btn btn-primary mt-5">Log out</a>
    </div>
</body>

</html>