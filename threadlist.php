<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Threads-DiscussKro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 
    <style>
    *, ::before {
    box-sizing: border-box;
    margin: auto;
}
</style> 
  </head>
  <body>
    <?php require "partials/_dbconnect.php" ?>
 <!-- navbar start -->
 <?php require "partials/header.php" ?>
    <!-- navbar ends -->

    <!-- division for jumbotron like structure-->
    
    <div class="container mt-3">
      
      <?php
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){


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
  </div>

  <h1>Discussion</h1>

<!-- form for answer start here -->
<?php
echo '<div class="container">

       
        <form action="'. $_SERVER["REQUEST_URI"] .'" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Solution for the Problem</label>
                <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                <input type="hidden" name="sno" value="'. $_SESSION['sno'].'">
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>

    </div>'
?>


<!-- adding solutions -->
<?php 
$method=$_SERVER['REQUEST_METHOD'];
$insertion=false;
if($method=='POST')
{
  $th_content=$_POST['content'];
  $sno=$_POST['sno'];
  $th_content=str_replace("<","&lt",$th_content);
  $th_content=str_replace(">","&gt",$th_content);
  $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `user_id`, `comment_date`) VALUES ('$th_content', '$id', '$sno', current_timestamp());";
  $result=mysqli_query($conn,$sql);


}

?>

<!-- adding solutions -->


    <?php

$id=$_GET['cat_id'];
$sql="SELECT * FROM `comments` WHERE `thread_id`='$id'";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount!=0){
while($row=mysqli_fetch_assoc($result))
{   
      $content=$row['comment_content'];
      $userid=$row['user_id'];
      $i_d=$row['comment_content'];
      $comment_id=$row['comment_id'];
      $sql2="SELECT `username` FROM `users` WHERE `sno`='$comment_id'";
      $result2=mysqli_query($conn,$sql2);
      $row2=mysqli_fetch_assoc($result2); 

  echo '<div class="d-flex">
    <div class="flex-shrink-0">
        <img src="images/userdefault.png" width="40px" alt="Sample Image">
    </div>
    <div class="flex-grow-1 ms-3">
        <p>'.$content.'- <b>'.$row2['username'].'</b></p>
    </div>
</div>';
}
}

else{
  echo '<p class="text-center"><b>Be the first one to answer the question</b></p>';
}
      }
      else
      {echo'
        <div class="container mt-3">
  <h2>You are not logged in!!</h2>
  <div class="mt-4 p-5 bg-dark text-white rounded">
    <h1>Log in to see the solution</h1> 
    <p>It seems you are not logged in. Log in to preview the solution to threads</p> 
  </div>
</div>';
      } 




 ?>

<!-- form for answer ends here -->





</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>