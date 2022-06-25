<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
 <!-- navbar start -->
 <?php require "partials/header.php" ?>
    <!-- navbar ends -->
    <?php require "partials/_dbconnect.php" ?>


<!-- division for jumbotron like structure-->

<div class="container mt-3">

<?php

$id=$_GET['cat_id'];
$sql="SELECT * FROM `threads` WHERE `thread_id`='$id'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{   
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];
}
?>

  <div class="mt-4 p-5 bg-dark text-white rounded">
    <h1><?php echo $title ?></h1> 
    <p><?php echo $desc?></p> 
    <p><b>Post By-Priyanshu</b></p>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>