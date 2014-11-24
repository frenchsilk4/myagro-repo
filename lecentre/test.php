<!DOCTYPE html>
<?php
session_start();
var_dump($_SESSION);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/myagrogreennotext3.ico">

    <title>Nouveau Contrat</title>

    <!-- Bootstrap core CSS -->
    <link href="_bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="_css/jquery-ui.css" />

  <link rel="stylesheet" type="text/css" href="_css/style.css">
  <style type="text/css">
     .round
    {
    display: inline-block;
    height: 30px;
    width: 30px;
    line-height: 30px;

    -moz-border-radius: 15px;
    border-radius: 15px;

    background-color: black;
    color: white;
    text-align: center;
    font-size: 1em;
    }
    </style>
  </head>
  <body>
      <form method="POST" action='add.php'>
          <input type='text' name='cry' value="yes">
          <input type="submit" value="gone">
      </form>
  </body>
  </html>