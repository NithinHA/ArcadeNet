<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="AdminBSBMaterialDesign-master/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="AdminBSBMaterialDesign-master/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="AdminBSBMaterialDesign-master/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="AdminBSBMaterialDesign-master/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>ARCADE</b>net</a>
            <small>Sign in page</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="login.php">
                    <div class="msg">You're just one step away from diving into the ocean of awesome games!</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="submit" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="signup.php">Click here to register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="AdminBSBMaterialDesign-master/js/admin.js"></script>
    <script src="AdminBSBMaterialDesign-master/js/pages/examples/sign-in.js"></script>
	<script src="AdminBSBMaterialDesign-master\plugins\jquery\jquery.min.js"></script>
	<script src="AdminBSBMaterialDesign-master\plugins\bootstrap\js\bootstrap.js"></script>

  <?php

    if (isset($_POST['submit'])) {

      require "db.php";

      $username = $_POST['username'];
      $password = $_POST['password'];


      $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."';";
      $res = mysqli_query($connection, $sql);

      if (mysqli_num_rows($res) == 1) {
        //session_start();
        $_SESSION['user'] = $username;
        echo "<script> location.replace(\"Arcadenet.php\"); </script>";
        exit;
      } else {
        echo "<script>alert(\"Username or password incorrect\"); </script>";
      }
    }
   ?>
</body>
</html>
