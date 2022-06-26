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

  <h1>Discussion</h1>

<!-- form for answer start here -->

<div class="container">

       
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Solution for the Problem</label>
                <textarea class="form-control" id="content" name="content" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>



<!-- adding solutions -->
<?php 
$method=$_SERVER['REQUEST_METHOD'];
$insertion=false;
if($method=='POST')
{
  $th_content=$_POST['content'];
  $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `user_id`, `comment_date`) VALUES ('$th_content', '$id', '0', current_timestamp());";
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



  echo '<div class="d-flex">
    <div class="flex-shrink-0">
        <img src="images/userdefault.png" width="40px" alt="Sample Image">
    </div>
    <div class="flex-grow-1 ms-3">
        <p>'.$content.'</p>
    </div>
</div>';
}
}

else{
  echo '<p class="text-center"><b>Be the first one to answer the question</b></p>';
}
 ?>

<!-- form for answer ends here -->





</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>