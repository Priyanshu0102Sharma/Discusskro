<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

            <!-- css link -->
    <link rel="stylesheet" href="./styles/style.css">

    <title>DiscussKro-Coding Forum</title>

</head>

<body>
    <!-- navbar start -->
    <?php require "partials/header.php" ?>
    <!-- navbar ends -->
    <?php require "partials/_dbconnect.php" ?>

    <!-- caurseal start here -->

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="./images/1.jpg" class="d-block w-100" alt="..." height="500">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="./images/2.jpg" class="d-block w-100" alt="..." height="500">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="./images/3.jpg" class="d-block w-100" alt="..." height="500">
            </div>
        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button> -->
    </div>

    <!-- caurseal end here -->
    <div class="container text-center">
        <h2>DiscussKro- Categories</h2>
        <div class="row">

            <!-- for loop dwara iterate krenge -->
            <?php

$imgarray=array("python.png","js.jpg","php.png");
$i=0;

$sql="SELECT * FROM `category`";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
    $col= $row['category_name'];
    $col_desc=$row['category_description'];
echo 
    '<div class="col-md-4 my-2">
    <div class="card" style="width: 18rem;">
  <img src="./images/'.$imgarray[$i].'" class="card-img-top" alt="..." height="250">
  <div class="card-body">
    <h5 class="card-title">'. $col .'</h5>
    <p class="card-text">'. substr($col_desc,0,50) .'....'.'</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </div>';
++$i;
}

?>



        </div>


    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>