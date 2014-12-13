<?php
// Copyright 2014 myAgro. All Rights Reserved.
//
// Description: shared header file for Le Centre application.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Le Centre</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="static/images/myagrogreennotext3.ico">
    <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/jumbotron.css">
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
</head>

<body>

<!-- Header menu -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Le Centre</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="contractslist.php">Liste de contrats</a></li>
                <li><a href="searchpage.php">Chercher contrats</a></li>
                <li><a href="receiptslist.php">Liste de recus</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="form" action='logout.php' method="post">
                <div class="form-group">
                    <input type="text" placeholder="Email" readonly="true" value='<?php echo $login_session;?>' class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign out</button>
            </form>
        </div>
    </div>
</div>
