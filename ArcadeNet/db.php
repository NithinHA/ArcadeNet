<?php
$connection = mysqli_connect("localhost", "root", "", "web");

if (!$connection) {
  die("Database connection error: " . mysqli_connect_errno());
}

 ?>
