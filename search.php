<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DiscussKro-Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <?php require "partials/_dbconnect.php" ?>
 <!-- navbar start -->
 <?php require "partials/header.php" ?>
    <!-- navbar ends -->



    <div class="container">

    <h1 class="search_result text-center my-3">Search result for <em>"<?php echo $_GET['search'] ?>"</em> </h1>
<?php
$nosearch=true;
    $query=$_GET['search'];
    $sql="SELECT * from `threads` where match (`thread_title`,`thread_desc`) AGAINST ('$query')";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
{   
    $nosearch=false;
      $i_d= $row['thread_id'];
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];
    $url="threadlist.php?cat_id=".$i_d;
    echo '<div class="result">
    <h3><a href="'.$url.'" class="text-dark">'. $title . '</a></h3>
    <p>'. $desc .'</p>
</div>';
}    
if($nosearch==true)
{
    echo '<div class="container mt-3">
    <div class="mt-4 p-5 bg-danger text-white rounded">
      <h1>No result found</h1> 
      <p>Your search case is not found!!!!</p> 
    </div>
  </div>';
}
?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>