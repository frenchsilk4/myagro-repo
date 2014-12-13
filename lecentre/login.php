<?php
// Copyright 2014 myAgro. All Rights Reserved.
//
// Description:
// - Checks for login credentials. If none found, show login form. Otherwise redirect.
// - Also handle form POST from login form, and if valid, redirect.
include ("config.php");
session_start();

// FIXME - this is *not* a secure login implementation. This needs to be
// revisited and re-implemented.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process login form
    $myusername = strtolower(mysqli_real_escape_string($db, $_POST['username']));
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql    = "SELECT id FROM users WHERE username='$myusername' and password='$mypassword'";
    $result = mysqli_query($db, $sql);
    $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['id'];
    $count  = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['logged']     = 'YES';
        header("Location: welcome.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
} else {
    // Normal GET, so check if already logged in
    if (isset($_SESSION['login_user'])) {
        $user_check = $_SESSION['login_user'];
        $ses_sql = mysqli_query($db, "select username from users where username='$user_check' ");
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
        $login_session = $row['username'];
        if (isset($login_session)) {
            header("Location: welcome.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/myagrogreennotext3.ico">

    <title>Ngasene Contract System</title>

    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="_css/signin.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <form class="form-signin" role="form" action="" method="post">
            <img src="images/myagrogreennotext.png" style="width: 190px; height: 184px;">
            <h2 class="form-signin-heading">Please sign in</h2>
            <input type="email" name='username' class="form-control" placeholder="Email address" required autofocus>
            <input type="password" name='password' class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div> <!-- /container -->

<script src="_js/jquery-2.1.1.min.js"></script>
<script src="_bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
