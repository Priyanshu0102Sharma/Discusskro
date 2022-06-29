<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <style>
    *, ::before {
    box-sizing: border-box;
    margin: auto;
}
</style>

    </head>

<body>
    <!-- database connect here -->
    <?php require "partials/_dbconnect.php" ?>
    <!-- navbar start -->
    <?php require "partials/header.php" ?>
    <!-- navbar ends -->




    <!-- jumbotron used for displaying the categroy informantion-->

    <div class="container mt-3">

        <?php

$id=$_GET['catid'];
$sql="SELECT * FROM `category` WHERE `category_id`='$id'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{   
    $col= $row['category_name'];
    $col_desc=$row['category_description'];
}
?>

        <div class="mt-4 p-5 bg-dark text-white rounded">
            <h1>Welcome to <?php echo $col ?></h1>
            <p><?php echo $col_desc?></p>
        </div>
    </div>

<!-- category information ended -->

    <!-- form for asking question start here-->
   <?php
   if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'])==true )
   {echo '<div class="container">

  <h1 class="text-center my-3">Start the Discussion :p</h1>
        <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Type Your Problem Here</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">please write your problem title in short and exact.</div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Elaborate your Problem</label>
                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>';
   }
   else{
    echo '   <h2 class="text-center my-2 " style="color:red">You are not logged in</h2>
    <p class="text-center">log in to enter the threads</p>';
   }

   
   ?>
    <!-- form for asking question ends here -->
<!-- questions/threads asked by users start here -->
    <div class="container my-5">
        <h3 class="text-center">Browse Question</h3>





<!-- adding question/threads by users into database start here-->
<?php 
$method=$_SERVER['REQUEST_METHOD'];
$insertion=false;
if($method=='POST')
{$sno=$_POST['sno'];
    echo $sno;
  $th_title=$_POST['title'];
  $th_desc=$_POST['description'];
  $th_title=str_replace("<","&lt",$th_title);
  $th_title=str_replace(">","&gt",$th_title);
  $th_desc=str_replace("<","&lt",$th_desc);
  $th_desc=str_replace(">","&gt",$th_desc);
  $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp());";
  $result=mysqli_query($conn,$sql);


}

?>
<!-- adding questions/threads by user ends here -->



        <!-- media objects -->

<?php

$id=$_GET['catid'];
$sql="SELECT * FROM `threads` WHERE `thread_cat_id`='$id'";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$number=1;
if($rowcount!=0){
while($row=mysqli_fetch_assoc($result))
{   
      $i_d= $row['thread_id'];
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];
    $date=$row['timestamp'];
    $userid=$row['thread_user_id'];
    $sql2="SELECT `username` FROM `users` WHERE `sno`='$userid'";
       $result2=mysqli_query($conn,$sql2);
       $row2=mysqli_fetch_assoc($result2); 


  echo '<div class="d-flex">
    <div class="flex-shrink-0">
        <img src="images/userdefault.png" width="40px" alt="Sample Image">
    </div>
    <div class="flex-grow-1 ms-3">
        <h5><a href="threadlist.php?cat_id='.$i_d.'" class="text-dark">'.$title.'</a></h5>
        <p class="my-0"> '.$desc.'- <b>'.$row2['username'].'</b></p>

    </div>
</div>';
}
}

else{
  echo '<p class="text-center"><b>Be the first one to ask the question</b></p>';
}
 ?>
<!-- questions/threads asked by the users end here -->





    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>