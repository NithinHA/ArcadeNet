<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>ArcadeNet</title>

    <!-- Bootstrap Core Css -->
    <link href="AdminBSBMaterialDesign-master/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="AdminBSBMaterialDesign-master/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="AdminBSBMaterialDesign-master/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="bg-TWO">

  <div class="container theme-black">
    <div class="row">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="col-md-4">
            <div class="navbar-header text-center">
              <div class="col-lg-2 col-md-3 col-sm-12 col-xs-2">
                <a href="Arcadenet.php"><img src="arcade_net.png" width="50px"/></a>
              </div>
              <a class="navbar-brand font-45" href="Arcadenet.php"><b>ARCADE</b> NET</a>
            </div>
          </div>
          <!-- <div class="navbar-header  navbar-right">
            <a href="upload.php">
              <button class="btn btn-block bg-pink waves-effect" name="upload" type="submit">UPLOAD</button>
            </a>
          </div> -->
        </div>
      </nav>
    </div>
    <br><br><br><br><br>
    <h2>Enter your game details</h2>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
      <div class="form-group">
        <label>Enter game title:</label>
        <input type="text" class="form-control" id="gname" name="gname">
      </div>
      <div class="form-group">
        <label>Enter a short description about the game:</label>
        <input type="text" class="form-control" id="gdesc" name="gdesc">
      </div>


      <!-- <div class="checkbox">
        <label>Select the catagory that the game belongs to:</label><br>
        <label><input type="checkbox" name="action" class="filled-in chk-col-pink">Action</label><br>
        <label><input type="checkbox" name="adventure" class="filled-in chk-col-pink">Adventure</label><br>
        <label><input type="checkbox" name="adventure" class="filled-in chk-col-pink">Adventure</label><br>
        <label><input type="checkbox" name="horror" class="filled-in chk-col-pink">Horror</label><br>
        <label><input type="checkbox" name="typing" class="filled-in chk-col-pink">Typing</label><br>
        <label><input type="checkbox" name="shooter" class="filled-in chk-col-pink">Shooter</label>
      </div> -->


      <div class="form-group">
        <label for="sel1">Select Catagory:</label>
        <select class="form-control" id="genre" name="genre">
          <option>Action</option>
          <option>Adventure</option>
          <option>Platformer</option>
          <option>Shooter</option>
          <option>Puzzle</option>
          <option>RPG</option>
          <option>Simulation</option>
        </select>
      </div><br><br>

      <div class="form-group">
        <label>Provide link for the game:</label>
        <input type="text" class="form-control" id="glink" name="glink">
      </div>

      <div class="form-group">
        <label>Upload game thumbnail:</label>
        <input type="file" class="form-control" id="file" name="file">
      </div>

      <button type="submit" class="btn btn-lg bg-pink waves-effectt" name="upload">Upload</button>
    </form>
  </div>


 <script src="AdminBSBMaterialDesign-master\plugins\jquery\jquery.min.js"></script>
<script src="AdminBSBMaterialDesign-master\plugins\bootstrap\js\bootstrap.js"></script>


    <!-- Jquery Core Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="AdminBSBMaterialDesign-master/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="AdminBSBMaterialDesign-master/js/admin.js"></script>
    <script src="AdminBSBMaterialDesign-master/js/pages/widgets/infobox/infobox-1.js"></script>

    <!-- Demo Js -->
    <script src="AdminBSBMaterialDesign-master/js/demo.js"></script>



    <?php

      if (isset($_POST['upload'])) {
        //Database connection
        require "db.php";

        $file_name = $_FILES['file']['name'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_err = $_FILES['file']['error'];

        $file_ext = explode('.',$file_name);
        $file_actual_ext = strtolower(end($file_ext));
        $allowed = array('jpg', 'jpeg', 'png');
        if(in_array($file_actual_ext, $allowed)){
          if($file_err === 0){
            $file_name_new = uniqid('', true).".".$file_actual_ext;
            $file_destination = 'game_thumbnails/'.$file_name_new;
            move_uploaded_file($file_tmp_name, $file_destination);
          } else{
            echo "<script>alert(\"There was an error uploading your file!\"); </script>";
            exit;
          }
        } else{
          echo "<script>alert(\"Cannot upload files of this type!\"); </script>";
          exit;
        }

        $gname = $_POST['gname'];
        $gdesc = $_POST['gdesc'];
        $thumbnail = $file_destination;
        $link = $_POST['glink'];
        $developer = $_SESSION['user'];
        $genre = strtolower($_POST['genre']);

        // echo "<script>alert(\"Image:$thumbnail\"); </script>";
        $sql = "SELECT * FROM games WHERE name='".$gname."';";
        $res = mysqli_query($connection, $sql);

        if (mysqli_num_rows($res) == 0) {
          $sql = "INSERT INTO games (`name`, `description`, `icon`, `link`, `genre`, `developer`) VALUES ('".$gname."', '".$gdesc."', '".$thumbnail."', '".$link."', '".$genre."', '".$developer."')";
          if (mysqli_query($connection, $sql)) {
            echo "<script>alert(\"$gname added successfully\"); </script>";
            // session_start();
            echo "<script> location.replace(\"Arcadenet.php\"); </script>";
            exit;
          } else {
            echo "<script>alert(\"Error-1: Can not add $gname\"); </script>";
          }
        } else {
          echo "<script>alert(\"Error-2: Can not add $gname\"); </script>";
        }
      }
    ?>


</body>
</html>
