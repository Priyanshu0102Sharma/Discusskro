<?php

echo 
'<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DiscussKro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>

          <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>

        </li>
      
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success " type="submit">Search</button>
      </form>
      <div class="loginbtns">
        <button class="btn btn-outline-warning mx-2 " data-bs-toggle="modal" data-bs-target="#loginModal" >Login</button>
        <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#signupModal" >SignUp</button>
      </div>
    </div>
  </div>
</nav>';

require "_signupmodal.php";
include "_loginmodal.php";

if($_GET['signupsuccess']&&$_GET['signupsuccess']=="true")
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You can now login!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($_GET['signupsuccess']&&$_GET['signupsuccess']=="false")
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failure!</strong> You were not able to signup because either you have taken repeated email id or password didn\'t match !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>