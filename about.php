<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  
    <style>
    *, ::before {
    box-sizing: border-box;
    margin: auto;
}

</style>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>

  <body>
    <?php require "partials/_dbconnect.php" ?>
 <!-- navbar start -->
 <?php require "partials/header.php" ?>
    <!-- navbar ends -->

    <style>

#co-1{
  min-height: 100vh;
}

    </style>


<div class="container" id="co-1">
<div class="container">
<div class="container mt-3">
  <h2>DiscussKro</h2>
  <div class="mt-4 p-5 bg-dark text-white rounded">
    <h1>Coding Forum</h1> 
    <p>Discuss Kro is a coding platform made for coders all around the world to ask their querries and to get their solution.</p> 
  </div>
</div>
</div>
</div>


    <?php require "partials/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>