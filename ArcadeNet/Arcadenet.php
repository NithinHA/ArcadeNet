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


  <!-- Carousel -->

  <div class="container m-t-100 p-b-30 bg-ONE">
    <h2 class="p-t-20 p-b-20 p-l-20 p-r-20 m-b-20 bg-THREE">Featured</h2>

    <div class="col-lg-2">
    </div>
    <div class="col-lg-8 col-md-12">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%">


      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="game_thumbnails/pic1.png" alt="arrow_shooter" style="width:100%">
        </div>

        <div class="item">
          <img src="game_thumbnails/pic2.png" alt="dungeon_breakout" style="width:100%;">
        </div>

        <div class="item">
          <img src="game_thumbnails/pic3.png" alt="endless_runner" style="width:100%;">
        </div>

        <div class="item">
          <img src="game_thumbnails/pic4.png" alt="keyboard_warrior" style="width:100%;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- <div class="col-lg-4 col-md-4">
      <h2 class="">Sample Text!!</h2>

  </div> -->
  </div>


<!-- Browse games -->

  <div class="container m-t-30 p-b-30 bg-ONE">
    <h2 class="p-t-20 p-b-20 p-l-20 p-r-20 m-b-20 bg-THREE">Genre</h2>
    <div class="row">

		  <div class="col-md-2">
			  <a href="action.php"><img src="action.png" width="150px"/>
        <div class="text align-center bg-THREE">Action</div></a>
		  </div>
		  <div class="col-md-2">
			  <a href="adventure.php"><img src="adventure.png" width="150px"/>
        <div class="text align-center bg-THREE">Adventure</div></a>
      </div>
      <div class="col-md-2">
        <a href="platformer.php"><img src="platformer.png" width="150px"/>
        <div class="text align-center bg-THREE">Platformer</div></a>
		  </div>
		  <div class="col-md-2">
        <a href="shooter.php"><img src="shooter.png" width="150px"/>
        <div class="text align-center bg-THREE">Shooter</div></a>
		  </div>
		  <div class="col-md-2">
        <a href="puzzle.php"><img src="puzzle.png" width="150px"/>
        <div class="text align-center bg-THREE">Puzzle</div></a>
      </div>
      <!-- <div class="col-md-2">
        <a href="rpg.html"><img src="rpg.png" width="100px"/></a>
        <div class="text">RPG</div>
      </div> -->
      <div class="col-md-2">
        <a href="simulation.php"><img src="simulation.png" width="150px"/>
        <div class="text align-center bg-THREE">Simulation</div></a>
      </div>

    </div>
  </div>


  <!-- Display all games -->

  <div class="container m-t-30 p-b-30 bg-ONE">
    <h2 class="p-t-20 p-b-20 p-l-20 p-r-20 m-b-20 bg-THREE">All Games</h2>

      <?php
        require "db.php";

        $sql = "SELECT * FROM games;";
        $res = mysqli_query($connection, $sql);
        if(mysqli_num_rows($res) > 0){
            while($row = $res->fetch_assoc()){
              //echo "<br> name: ". $row["name"]. " - Desc: ". $row["description"]. "<br>Genre: " . $row["genre"] . " Developer: ".$row["developer"]."<br>";
              echo "<div class=\"row\">
                      <a href=".$row['link']." target=\"_blank\">
                        <div class=\"col-md-4\">
                          <div class=\"thumbnail\">
                            <img src=".$row['icon']." alt=\"Lights\" style=\"width:100%\">
                          </div>
                        </div>
                        <div class=\"caption m-l-4\">
                          <h3>".$row['name']."</h3>
                      </a>
                          <h4>Developer: <i>".$row['developer']."</i></h4>
                          <h4>Description: </h4><p>".$row['description']."</p>
                        </div>

                    </div>";

            }
        }else{
          echo "<div class=\"align-center\"><h2>Oops! <br>No games found..</h2></div>";
        }


      ?>
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
</body>
</html>
