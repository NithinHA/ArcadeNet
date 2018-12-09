<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Adventure</title>

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
          <div class="navbar-header navbar-right">
            <!-- <div class="col-xs-4"> -->
            <a href="upload.php">
              <button class="btn btn-block btn-lg bg-pink waves-effect" name="upload" type="submit">UPLOAD</button>
            </a>
            <!-- </div> -->
          </div>
        </div>
      </nav>
    </div>
  </div>


<div class="container m-t-40 p-t-30">
  <h2 class="p-t-20 p-b-20 p-l-20 p-r-20 m-b-20 bg-FOUR">Adventure Games:</h2>

  <div class="row">
    <?php
      require "db.php";

      $sql = "SELECT * FROM games WHERE genre='adventure';";
      $res = mysqli_query($connection, $sql);
      if(mysqli_num_rows($res) > 0){
          while($row = $res->fetch_assoc()){
            //echo "<br> name: ". $row["name"]. " - Desc: ". $row["description"]. "<br>Genre: " . $row["genre"] . " Developer: ".$row["developer"]."<br>";
            echo "<div class=\"col-md-3\">
              <div class=\"thumbnail\">
                <a href=".$row['link']." target=\"_blank\">
                  <img src=".$row['icon']." alt=\"Lights\" style=\"width:100%\">
                  <div class=\"caption\">
                    <h4>".$row['name']."</h4>
                    <p>Developer:".$row['developer']."</p>
                    <p>".$row['description']."</p>
                  </div>
                </a>
              </div>
            </div>";

          }
      }else{
        echo "<div class=\"align-center\"><h2>Oops! <br>There aren't any games in this genre yet..</h2></div>";
      }

    ?>


  </div>
</div>


 <script src="AdminBSBMaterialDesign-master\plugins\jquery\jquery.min.js"></script>
<script src="AdminBSBMaterialDesign-master\plugins\bootstrap\js\bootstrap.js"></script>
</body>
</html>
